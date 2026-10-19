<?php

/*
 * Ops decision 2026-10-17: the "You are visitor number" hit counter is gone. It started at 1337 and
 * fell back to rand(1337, 9999), so it showed an invented number. Don't bring back fake counters.
 */
it('shows no visitor counter on the homepage', function (): void {
    $this->get('/')->assertOk()
        ->assertDontSee('visitor number')
        ->assertDontSee('hit-counter');
});

it('has no random or seeded counter numbers in app code or views', function (): void {
    $offenders = [];

    foreach ([app_path(), resource_path('views')] as $dir) {
        foreach (\Illuminate\Support\Facades\File::allFiles($dir) as $file) {
            if (preg_match('/\b(?:mt_)?rand\s*\(|random_int\s*\(|visitorCount|VisitorCounter/', $file->getContents(), $match) === 1) {
                $offenders[] = $file->getRelativePathname().": {$match[0]}";
            }
        }
    }

    expect($offenders)->toBeEmpty('No fake counters: '.implode(', ', $offenders))
        ->and(data_get(json_decode((string) file_get_contents(base_path('data/site-content.json')), true), 'site.visitorCount'))->toBeNull();
});
