<?php

use Illuminate\Support\Facades\File;

/*
 * Standing rule: GA4 only, no Umami or Plausible. Existing non-GA4 references are grandfathered
 * in guardrailNonGa4Baseline() and may only go down. GA4 event names must be valid GA4 names.
 */

/** @return array<string, int> file => grandfathered Umami/Plausible references */
function guardrailNonGa4Baseline(): array
{
    return [];
}

/** @return array<string, string> relative path => contents of app, config, resources and routes */
function guardrailAnalyticsSources(): array
{
    $sources = [];

    foreach (['app', 'config', 'resources', 'routes'] as $dir) {
        foreach (File::allFiles(base_path($dir)) as $file) {
            $sources[$dir.'/'.str_replace('\\', '/', $file->getRelativePathname())] = (string) file_get_contents($file->getPathname());
        }
    }

    return $sources;
}

it('adds no Umami or Plausible tracking', function (): void {
    $offenders = [];
    $seen = [];

    foreach (guardrailAnalyticsSources() as $path => $contents) {
        $count = preg_match_all('/umami|plausible\.io|window\.plausible|analytics\.48web\.com|data-website-id=/i', $contents);

        if ($count > 0) {
            $seen[$path] = $count;
        }

        if ($count > (guardrailNonGa4Baseline()[$path] ?? 0)) {
            $offenders[] = "{$path} ({$count})";
        }
    }

    expect($offenders)->toBeEmpty('GA4 only. Do not add Umami or Plausible: '.implode(', ', $offenders));

    foreach (guardrailNonGa4Baseline() as $path => $count) {
        expect($seen[$path] ?? 0)->toBe($count, "{$path} has fewer non-GA4 references now; lower its baseline");
    }
});

it('uses valid GA4 event names', function (): void {
    preg_match_all('/gtag\(\s*[\'"]event[\'"]\s*,\s*[\'"]([^\'"]+)[\'"]/', implode("\n", guardrailAnalyticsSources()), $names);

    foreach ($names[1] as $name) {
        expect($name)->toMatch('/^[a-z][a-z0-9_]{0,39}$/', "GA4 event \"{$name}\" must be snake_case, start with a letter and be at most 40 characters");
    }

    expect($names[1])->toBeArray();
});
