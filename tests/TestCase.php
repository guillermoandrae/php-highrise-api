<?php

namespace GuillermoandraeTest\Highrise;

use Guillermoandrae\Highrise\Http\GuzzleAdapter;
use Guillermoandrae\Highrise\Repositories\ResourceFactory;
use Guillermoandrae\Highrise\Repositories\RepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    protected function assertSameLastRequestUri(string $uri, RepositoryInterface $resource)
    {
        $this->assertSame($uri, $resource->getAdapter()->getLastRequest()->getUri()->getPath());
    }

    protected function getMockResource(string $name, string $expectedBody)
    {
        $client = $this->getMockClient(200, [], $expectedBody);
        $adapter = $this->getAdapter($client);
        return ResourceFactory::factory($name, $adapter);
    }

    protected function getAdapter(Client $client): GuzzleAdapter
    {
        $adapter = new GuzzleAdapter('test', '123456');
        $adapter->setClient($client);
        return $adapter;
    }

    protected function getMockClient($expectedHttpStatusCode, array $expectedHeaders = [], $expectedBody = ''): Client
    {
        $mock = new MockHandler([
            new Response($expectedHttpStatusCode, $expectedHeaders, $expectedBody)
        ]);
        $handler = HandlerStack::create($mock);
        return new Client(['handler' => $handler]);
    }

    protected function getAccountXml(): string
    {
        return '<account>
<id type="integer">1</id>
  <name>Your Company</name>
  <subdomain>yourco</subdomain>
  <plan>premium</plan>
  <owner-id type="integer"></owner-id>
  <people-count type="integer">9412</people-count>
  <storage type="integer">17374444</storage>
  <color_theme>blue</color_theme>
  <ssl_enabled>true</ssl_enabled>
  <created-at type="datetime">2007-01-12T15:00:00Z</created-at>
  <updated-at type="datetime">2007-01-12T15:00:00Z</updated-at>
</account>';
    }
}
