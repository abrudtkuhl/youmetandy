<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Http;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Tests never reach the network: the homepage pulls RSS feeds (RssFeedParser) with
        // 10-second timeouts. Feeds answer with an empty channel unless a test fakes them itself.
        Http::preventStrayRequests();
        Http::fake(['*' => Http::response('<rss><channel></channel></rss>', 200)]);
    }
}
