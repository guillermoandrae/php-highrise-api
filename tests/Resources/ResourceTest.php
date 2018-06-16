<?php

namespace GuillermoandraeTest\Highrise\Resources;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Guillermoandrae\Highrise\Http\Client as HttpClient;
use Guillermoandrae\Highrise\Resources\AbstractResource;
use PHPUnit\Framework\TestCase;

class ResourceTest extends TestCase
{
    private $resource;

    public function testFetch()
    {
        $item = $this->resource->fetch(2);
        $this->assertEquals(6, $item->id);
    }

    public function testSearch()
    {
        $results = $this->resource->search();
        $this->assertCount(2, $results);
    }

    protected function setUp()
    {
        $mock = new MockHandler([
            new Response(200, [], '<test><id>6</id></test>'),
            new Response(200, [], '<tests><test><id>12</id></test><test><id>18</id></test></tests>'),
        ]);
        $handler = HandlerStack::create($mock);
        $guzzleClient = new Client(['handler' => $handler]);
        $client = new HttpClient('test', '123456');
        $client->setGuzzleClient($guzzleClient);
        $this->resource = $this->getMockForAbstractClass(
            AbstractResource::class,
            [$client]
        );
    }
}
