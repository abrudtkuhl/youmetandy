<?php

namespace Tests;

use App\Helpers\RssFeedParser;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Http;
use ReflectionProperty;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Tests never reach the network: the homepage pulls RSS feeds (RssFeedParser) with
        // 10-second timeouts. Only those feed URLs answer (with an empty channel) unless a test fakes
        // them itself; any other request is a stray and throws.
        Http::preventStrayRequests();
        Http::fake(collect(self::feedUrls())
            ->mapWithKeys(fn (string $url): array => [$url => Http::response('<rss><channel></channel></rss>', 200)])
            ->all());
    }

    /** @return array<string, string> the feeds RssFeedParser reads */
    protected static function feedUrls(): array
    {
        /** @var array<string, string> $feeds */
        $feeds = (new ReflectionProperty(RssFeedParser::class, 'feeds'))->getValue();

        return $feeds;
    }
}
