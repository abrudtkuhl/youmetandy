<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RssFeedParser
{
    private static $feeds = [
        'brudtkuhl' => 'https://brudtkuhl.com/blog/feed.atom',
        'medium' => 'https://medium.com/@abrudtkuhl/feed',
        'substack' => 'https://abrudtkuhl.substack.com/feed'
    ];

    public static function getWriting($limit = 10)
    {
        return Cache::remember('rss_writing_feeds', 3600, function () use ($limit) {
            $allArticles = [];

            foreach (self::$feeds as $source => $url) {
                try {
                    $articles = self::parseFeed($url, $source);
                    $allArticles = array_merge($allArticles, $articles);
                } catch (\Exception $e) {
                    // Log error but continue with other feeds
                    Log::warning("Failed to parse RSS feed {$url}: " . $e->getMessage());
                }
            }

            // Sort by date (newest first)
            usort($allArticles, function ($a, $b) {
                return strtotime($b['date']) - strtotime($a['date']);
            });

            return array_slice($allArticles, 0, $limit);
        });
    }

    private static function parseFeed($url, $source)
    {
        $response = Http::timeout(10)->get($url);
        
        if (!$response->successful()) {
            throw new \Exception("Failed to fetch RSS feed: HTTP {$response->status()}");
        }

        $xml = $response->body();
        $data = simplexml_load_string($xml);

        if ($data === false) {
            throw new \Exception("Failed to parse XML");
        }

        $articles = [];

        // Handle Atom feeds
        if (isset($data->entry)) {
            foreach ($data->entry as $entry) {
                $articles[] = self::parseAtomEntry($entry, $source);
            }
        }
        // Handle RSS feeds
        elseif (isset($data->channel->item)) {
            foreach ($data->channel->item as $item) {
                $articles[] = self::parseRssItem($item, $source);
            }
        }

        return $articles;
    }

    private static function parseAtomEntry($entry, $source)
    {
        $title = (string) $entry->title;
        $link = (string) $entry->link['href'] ?? (string) $entry->link;
        $date = (string) $entry->published ?? (string) $entry->updated;
        $description = self::extractDescription($entry);

        return [
            'title' => $title,
            'description' => $description,
            'date' => self::formatDate($date),
            'link' => $link,
            'source' => $source,
            'badge' => self::getBadge($date)
        ];
    }

    private static function parseRssItem($item, $source)
    {
        $title = (string) $item->title;
        $link = (string) $item->link;
        $date = (string) $item->pubDate;
        $description = self::extractDescription($item);

        return [
            'title' => $title,
            'description' => $description,
            'date' => self::formatDate($date),
            'link' => $link,
            'source' => $source,
            'badge' => self::getBadge($date)
        ];
    }

    private static function extractDescription($item)
    {
        // Try different description fields
        $description = (string) ($item->summary ?? $item->description ?? $item->content);
        
        // Clean up HTML and limit length
        $description = strip_tags($description);
        $description = html_entity_decode($description, ENT_QUOTES, 'UTF-8');
        
        // Limit to 200 characters
        if (strlen($description) > 200) {
            $description = substr($description, 0, 197) . '...';
        }

        return $description ?: 'No description available';
    }

    private static function formatDate($dateString)
    {
        try {
            $date = new \DateTime($dateString);
            return $date->format('F j, Y');
        } catch (\Exception $e) {
            return 'Recently';
        }
    }

    private static function getBadge($dateString)
    {
        try {
            $date = new \DateTime($dateString);
            $now = new \DateTime();
            $diff = $now->diff($date);

            if ($diff->days <= 7) {
                return 'NEW!';
            } elseif ($diff->days <= 30) {
                return 'HOT!';
            }
        } catch (\Exception $e) {
            // Ignore date parsing errors
        }

        return null;
    }
}
