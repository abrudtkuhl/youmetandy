<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
 * Every GET page renders without reaching the network, and every page except the homepage is
 * kept out of search. The job-application pages (/velir, /domaine, /dropinadmin) were noindex
 * already; the /bike-proofreading-test spell-checker fixture was indexable.
 */

/** @return list<string> */
function guardrailPageUris(): array
{
    return collect(Route::getRoutes()->getRoutes())
        ->filter(fn ($route): bool => in_array('GET', $route->methods(), true) && ! str_contains($route->uri(), '{') && ! str_starts_with($route->uri(), '_') && ! str_starts_with($route->uri(), 'storage') && $route->uri() !== 'up')
        ->map(fn ($route): string => '/'.ltrim($route->uri(), '/'))
        ->values()
        ->all();
}

it('renders every page without real HTTP calls', function (): void {
    Http::preventStrayRequests();
    Http::fake(['*' => Http::response('<rss><channel></channel></rss>', 200)]);

    expect(guardrailPageUris())->not->toBeEmpty();

    foreach (guardrailPageUris() as $uri) {
        $this->get($uri)->assertOk();
    }
});

it('keeps every page except the homepage out of search', function (): void {
    Http::fake(['*' => Http::response('<rss><channel></channel></rss>', 200)]);

    foreach (guardrailPageUris() as $uri) {
        if ($uri === '/') {
            continue;
        }

        expect((string) $this->get($uri)->getContent())->toMatch('/<meta name="robots" content="noindex/', "{$uri} is indexable; application pages and test fixtures must be noindex");
    }
});
