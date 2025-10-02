<?php

namespace App\Helpers;

class SiteContent
{
    private static $data = null;

    public static function load()
    {
        if (self::$data === null) {
            $jsonPath = storage_path('app/public/data/site-content.json');
            
            // Try multiple possible paths for production
            $possiblePaths = [
                $jsonPath,
                public_path('storage/data/site-content.json'),
                public_path('data/site-content.json'),
                base_path('storage/app/public/data/site-content.json'),
                resource_path('data/site-content.json')
            ];
            
            foreach ($possiblePaths as $path) {
                if (file_exists($path)) {
                    $json = file_get_contents($path);
                    self::$data = json_decode($json, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        return self::$data;
                    }
                }
            }
            
            // Fallback to empty array if no valid file found
            self::$data = [];
        }
        return self::$data;
    }

    public static function get($key, $default = null)
    {
        $data = self::load();
        return data_get($data, $key, $default);
    }
    
    public static function getVisitorCount()
    {
        return VisitorCounter::get();
    }
    
    public static function incrementVisitorCount()
    {
        return VisitorCounter::increment();
    }
}
