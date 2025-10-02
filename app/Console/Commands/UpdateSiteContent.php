<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateSiteContent extends Command
{
    protected $signature = 'site:update {section} {--key=} {--value=}';
    protected $description = 'Update site content JSON file';

    public function handle()
    {
        $jsonPath = storage_path('app/public/data/site-content.json');
        
        if (!file_exists($jsonPath)) {
            $this->error('Site content file not found!');
            return 1;
        }

        $data = json_decode(file_get_contents($jsonPath), true);
        $section = $this->argument('section');
        $key = $this->option('key');
        $value = $this->option('value');

        if ($key && $value) {
            data_set($data, "{$section}.{$key}", $value);
            file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT));
            $this->info("Updated {$section}.{$key} = {$value}");
        } else {
            $this->info('Available sections:');
            foreach (array_keys($data) as $sectionName) {
                $this->line("- {$sectionName}");
            }
        }

        return 0;
    }
}
