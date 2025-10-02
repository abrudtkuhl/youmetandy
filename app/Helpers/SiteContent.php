<?php

namespace App\Helpers;

class SiteContent
{
    private static $data = null;

    public static function load()
    {
        if (self::$data === null) {
            $jsonPath = storage_path('app/public/data/site-content.json');
            if (file_exists($jsonPath)) {
                $json = file_get_contents($jsonPath);
                self::$data = json_decode($json, true);
            } else {
                self::$data = [];
            }
        }
        return self::$data;
    }

    public static function get($key, $default = null)
    {
        $data = self::load();
        return data_get($data, $key, $default);
    }
}
