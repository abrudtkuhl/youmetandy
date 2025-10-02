<?php

namespace App\Helpers;

class VisitorCounter
{
    private static $redisKey = 'visitor_count';
    private static $sessionKey = 'visitor_count';
    
    public static function increment()
    {
        // Try Redis first
        $count = self::getFromRedis();
        if ($count === null) {
            // Fallback to session
            $count = self::getFromSession();
            if ($count === null) {
                // Start with a 90s-style number
                $count = 1337;
            }
        }
        
        $newCount = $count + 1;
        
        // Save to both Redis and session
        self::saveToRedis($newCount);
        self::saveToSession($newCount);
        
        return $newCount;
    }
    
    public static function get()
    {
        // Try Redis first
        $count = self::getFromRedis();
        if ($count !== null) {
            return $count;
        }
        
        // Fallback to session
        $count = self::getFromSession();
        if ($count !== null) {
            return $count;
        }
        
        // Fallback to random 90s-style number
        return rand(1337, 9999);
    }
    
    private static function getFromRedis()
    {
        try {
            if (function_exists('redis')) {
                $redis = redis();
                return (int) $redis->get(self::$redisKey);
            }
        } catch (\Exception $e) {
            // Redis not available
        }
        return null;
    }
    
    private static function saveToRedis($count)
    {
        try {
            if (function_exists('redis')) {
                $redis = redis();
                $redis->set(self::$redisKey, $count);
            }
        } catch (\Exception $e) {
            // Redis not available
        }
    }
    
    private static function getFromSession()
    {
        try {
            if (session()->has(self::$sessionKey)) {
                return (int) session(self::$sessionKey);
            }
        } catch (\Exception $e) {
            // Session not available
        }
        return null;
    }
    
    private static function saveToSession($count)
    {
        try {
            session([self::$sessionKey => $count]);
        } catch (\Exception $e) {
            // Session not available
        }
    }
    
    public static function reset()
    {
        // Clear Redis
        try {
            if (function_exists('redis')) {
                $redis = redis();
                $redis->del(self::$redisKey);
            }
        } catch (\Exception $e) {
            // Redis not available
        }
        
        // Clear session
        try {
            session()->forget(self::$sessionKey);
        } catch (\Exception $e) {
            // Session not available
        }
        
        return self::increment();
    }
}
