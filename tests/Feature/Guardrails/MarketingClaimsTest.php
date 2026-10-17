<?php

use Illuminate\Support\Facades\File;

/*
 * Encodes the "unverified or invented marketing claims" repeat seen across Andy's sites: "5,000+
 * users", "99% accuracy", "analyzing 10,000+ ChatGPT conversations", fake testimonials and review
 * badges, outcome percentages with no source, placeholders, and dev hosts in public files. Every
 * claim needs a source and Andy's approval; see AGENTS.md.
 */

/** @return array<string, string> pattern name => regex */
function guardrailBannedClaimPatterns(): array
{
    return [
        'unsourced user count' => '/(?<![$\d,.])\b\d{1,3}(?:,\d{3})+\s*\+|(?<![$\d,.])\b\d+(?:\.\d+)?\s*[kK]\+|\b\d{1,3}(?:,\d{3})+\s+(?:users|customers|PMs|product managers|people|teams|businesses|companies|websites|subscribers|members)\b|(?<![$\d,.\-])\b\d{2,}\s+(?:users|customers|clients|coaches|teams|people|businesses|companies|subscribers|members|product managers|PMs)\b|\b\d[\d,]*\+?\s+(?:happy|satisfied|active)\s+(?:users|customers)/',
        'unsourced accuracy or rate' => '/\b\d{2,3}(?:\.\d+)?\s*%\s*(?:accura|precis|uptime|satisf|success rate|delivery rate)/i',
        'template placeholder' => '/\[(?:MAILING ADDRESS|ADDRESS|COMPANY(?: NAME)?|PHONE(?: NUMBER)?|NAME|EMAIL|CITY|STATE|TBD|TODO|PLACEHOLDER|INSERT[A-Z ]*|YOUR [A-Z ]+)\]|lorem ipsum/i',
        'unverified clean-result claim' => '/didn\'t flag anything|no (?:other )?(?:issues|errors|typos) (?:on|across) (?:the rest|your (?:whole|entire) site)/i',
        'testimonial markup' => '/class="[^"]*\btestimonial|<x-testimonial|@include\([\'"][^\'"]*testimonial|<blockquote\b[^>]*>\s*["“]/i',
        'unsourced conversation-analysis claim' => '/\banaly[sz](?:ing|ed|is of)\s+(?:over\s+|more than\s+)?\d[\d,.]*\s*[kK]?\+?\s+(?:ChatGPT\s+|AI\s+|LLM\s+)?(?:conversations|chats|prompts|sessions)\b|\b\d[\d,.]*\s*[kK]?\+?\s+ChatGPT\s+conversations\b/i',
        'unsourced outcome percentage' => '/\b\d{1,3}(?:\.\d+)?\s*%\s+(?:improved|increased|faster|more|less|fewer|reduction|reduced|higher|lower|better|growth|boost|cheaper)\b|\b(?:improved|increased|reduced|boosted|grew|cut)\b[^.<\n]{0,30}\b\d{1,3}\s*%/i',
        'unsourced trust badge or rating' => '/Reviewed by [^<\n]{0,40}\bTeam\b|\b(?:expert|vet|doctor)[- ](?:reviewed|approved|verified)\b|★{3,}|\b\d(?:\.\d)?\s*(?:\/\s*5|out of 5)\s*stars?\b|\btrusted by\b/i',
        'dev host in public copy' => '/https?:\/\/[a-z0-9.-]+\.(?:test|local)\b|https?:\/\/(?:localhost|127\.0\.0\.1)\b/i',
    ];
}

/**
 * Existing matches, grandfathered: file => [pattern name => max count]. Counts may only go down.
 * Each entry needs a reason. New claims go in with a source instead of a baseline entry.
 *
 * @return array<string, array<string, int>>
 */
function guardrailClaimsBaseline(): array
{
    return [];
}

/**
 * Claims Andy approved, each tied to its exact text and its source: file => [exact text => source].
 * Approved text is removed before the patterns run, so it passes while any other matching copy in
 * the same file still fails. Add entries only with Andy's approval.
 *
 * @return array<string, array<string, string>>
 */
function guardrailApprovedClaims(): array
{
    return [];
}

/**
 * @param  array<string, string>  $approved  exact text => source
 * @return array<string, int> pattern name => count, ignoring approved text
 */
function guardrailUnapprovedClaimMatches(string $contents, array $approved): array
{
    foreach ($approved as $text => $source) {
        if (trim($source) === '') {
            throw new LogicException("Approved claim \"{$text}\" has no source.");
        }

        $contents = str_replace($text, '', $contents);
    }

    return guardrailClaimMatches($contents);
}

/** @return array<string, int> pattern name => count */
function guardrailClaimMatches(string $contents): array
{
    $counts = [];

    foreach (guardrailBannedClaimPatterns() as $name => $pattern) {
        $count = preg_match_all($pattern, $contents);

        if ($count > 0) {
            $counts[$name] = $count;
        }
    }

    return $counts;
}

it('adds no unsourced claims, placeholders or dev hosts to views or public files', function (): void {
    $baseline = guardrailClaimsBaseline();
    $approved = guardrailApprovedClaims();
    $offenders = [];
    $files = [...File::allFiles(resource_path('views')), ...collect(['public/robots.txt', 'public/llms.txt', 'public/humans.txt', 'storage/app/public/data/site-content.json', 'data/site-content.json'])
        ->map(fn (string $name): string => base_path($name))
        ->filter(fn (string $path): bool => is_file($path))
        ->map(fn (string $path): SplFileInfo => new SplFileInfo($path))
        ->all()];

    foreach ($files as $file) {
        $relative = ltrim(str_replace([base_path(), '\\'], ['', '/'], $file->getPathname()), '/');

        foreach (guardrailUnapprovedClaimMatches((string) file_get_contents($file->getPathname()), $approved[$relative] ?? []) as $name => $count) {
            if ($count > ($baseline[$relative][$name] ?? 0)) {
                $offenders[] = "{$relative}: {$name} x{$count}";
            }
        }
    }

    expect($offenders)->toBeEmpty('Unverified claim, placeholder or dev host. Remove it, or get Andy\'s approval and record the exact text with its source in guardrailApprovedClaims(): '.implode('; ', $offenders));
});

it('keeps every approved claim sourced and still present', function (): void {
    foreach (guardrailApprovedClaims() as $relative => $claims) {
        foreach ($claims as $text => $source) {
            expect(trim($source))->not->toBe('', "{$relative}: \"{$text}\" needs a source")
                ->and((string) file_get_contents(base_path($relative)))->toContain($text);
        }
    }

    expect(guardrailApprovedClaims())->toBeArray();
});

it('lets approved copy pass while unapproved copy still fails', function (): void {
    $copy = '<h3>99% Accuracy</h3><p>98% accuracy on every page</p>';
    $approved = ['<h3>99% Accuracy</h3>' => 'Benchmark 2026-10 (Andy approved)'];

    expect(guardrailClaimMatches($copy))->toBe(['unsourced accuracy or rate' => 2])
        ->and(guardrailUnapprovedClaimMatches($copy, $approved))->toBe(['unsourced accuracy or rate' => 1])
        ->and(guardrailUnapprovedClaimMatches('<h3>99% Accuracy</h3>', $approved))->toBe([])
        ->and(fn () => guardrailUnapprovedClaimMatches('99% accuracy', ['99% accuracy' => ' ']))->toThrow(LogicException::class);
});

it('catches the real past mistakes', function (string $copy, string $pattern): void {
    expect(guardrailClaimMatches($copy))->toHaveKey($pattern);
})->with([
    'pmprompt user count' => ['Used by 5,000+ product managers.', 'unsourced user count'],
    'plain team count' => ['Used by 500 teams.', 'unsourced user count'],
    'plain user count' => ['Used by 1000 users.', 'unsourced user count'],
    'pmprompt old count' => ['Join 6,000+ PMs getting the best AI content every week', 'unsourced user count'],
    'SSC accuracy' => ['<h3>99% Accuracy</h3>', 'unsourced accuracy or rate'],
    'pmprompt #109 accuracy' => ['Provides 24/7 market monitoring with 90% accuracy', 'unsourced accuracy or rate'],
    'pmprompt #109 conversations' => ['These techniques are based on analyzing 10,000+ ChatGPT conversations from top-performing product teams.', 'unsourced conversation-analysis claim'],
    'conversations, unformatted count' => ['Based on 10000 ChatGPT conversations', 'unsourced conversation-analysis claim'],
    'conversations, k count' => ['We analyzed 10k+ AI conversations', 'unsourced conversation-analysis claim'],
    'mailing address placeholder' => ['<p>[MAILING ADDRESS]</p>', 'template placeholder'],
    'SSC #109 variant D' => ["A quick look at the rest of example.com didn't flag anything obvious.", 'unverified clean-result claim'],
    'fake testimonial block' => ['<div class="rounded testimonial-card">"Changed my life" - Jane D.</div>', 'testimonial markup'],
    'agencies case study' => ['<li>Outcome: 40% improved project margin</li>', 'unsourced outcome percentage'],
    'generic review badge' => ['<span>Reviewed by Spider Plant Care Team</span>', 'unsourced trust badge or rating'],
    'quoted testimonial' => ["<blockquote class=\"italic\">\n    \"This partnership transformed how we deliver.\"", 'testimonial markup'],
    'SSC #11 robots.txt' => ['Sitemap: https://sitespellchecker.test/sitemap.xml', 'dev host in public copy'],
]);

it('does not flag ordinary copy', function (string $copy): void {
    expect(guardrailClaimMatches($copy))->toBeEmpty();
})->with([
    'price' => ['One-time payment of $99 • 14-day money-back guarantee'],
    'year' => ['Updated for 2026'],
    'form number' => ['IRS Form 2553 and 1,040 instructions'],
    'salary range' => ['$180,000 - $300,000+'],
    'deal size' => ['Close 5 enterprise deals ($100K+ ARR each)'],
]);
