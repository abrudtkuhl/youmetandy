<?php

namespace App\Helpers;

class VisitorCounter
{
    private static $redisKey = 'visitor_count';
    private static $sessionKey = 'visitor_count';
    
    public static function increment()
    {
        $count = self::getFromRedis();
        if ($count === null) {
            $count = self::getFromSession();
            if ($count === null) {
                $count = 1337;
            }
        }
        
        $newCount = $count + 1;
        
        self::saveToRedis($newCount);
        self::saveToSession($newCount);
        
        return $newCount;
    }
    
    public static function get()
    {
        $count = self::getFromRedis();
        if ($count !== null) {
            return $count;
        }
        
        $count = self::getFromSession();
        if ($count !== null) {
            return $count;
        }
        
        return rand(1337, 9999);
    }
    
    private static function getFromRedis()
    {
        try {
            if (function_exists('cache') && config('cache.default') === 'redis') {
                return (int) cache()->get(self::$redisKey);
            }
        } catch (\Exception $e) {
        }
        return null;
    }
    
    private static function saveToRedis($count)
    {
        try {
            if (function_exists('cache') && config('cache.default') === 'redis') {
                cache()->put(self::$redisKey, $count, now()->addDays(30));
            }
        } catch (\Exception $e) {
        }
    }
    
    private static function getFromSession()
    {
        try {
            if (session()->has(self::$sessionKey)) {
                return (int) session(self::$sessionKey);
            }
        } catch (\Exception $e) {
        }
        return null;
    }
    
    private static function saveToSession($count)
    {
        try {
            session([self::$sessionKey => $count]);
        } catch (\Exception $e) {
        }
    }
    
    public static function reset()
    {
        try {
            if (function_exists('cache') && config('cache.default') === 'redis') {
                cache()->forget(self::$redisKey);
            }
        } catch (\Exception $e) {
        }
        
        try {
            session()->forget(self::$sessionKey);
        } catch (\Exception $e) {
        }
        
        return self::increment();
    }
}
