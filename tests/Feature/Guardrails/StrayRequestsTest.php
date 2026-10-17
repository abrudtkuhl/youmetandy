<?php

use App\Helpers\RssFeedParser;
use Illuminate\Http\Client\StrayRequestException;
use Illuminate\Support\Facades\Http;

/*
 * #1 (Copilot): tests/TestCase.php used to fake '*', so preventStrayRequests() never caught an
 * unexpected HTTP dependency. Only RssFeedParser's feeds are faked by default.
 */

it('fakes only the RSS feeds by default', function (): void {
    foreach ((new ReflectionProperty(RssFeedParser::class, 'feeds'))->getValue() as $url) {
        expect(Http::get($url)->successful())->toBeTrue($url);
    }
});

it('rejects any other outgoing request', function (): void {
    Http::get('https://api.example.com/unexpected');
})->throws(StrayRequestException::class);
