<?php

namespace GuillermoandraeTest\Highrise\Http;

use Guillermoandrae\Highrise\Http\GuzzleAdapter;
use Guillermoandrae\Highrise\Http\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GuzzleAdapterTest extends TestCase
{
    public function testRequestWithBody()
    {
        $body = '<test><name>test</name></test>';
        $client = $this->getGuzzleClient(201);
        $adapter = $this->getGuzzleAdapter($client);
        $adapter->request('GET', '/test.xml', ['body' => $body]);
        $this->assertSame($body, (string) $adapter->getLastRequest()->getBody());
    }

    public function testRequestWithoutBody()
    {
        $client = $this->getGuzzleClient(200);
        $adapter = $this->getGuzzleAdapter($client);
        $adapter->request('DELETE', '/test.xml');
        $this->assertEmpty((string) $adapter->getLastRequest()->getBody());
    }

    public function testRequestWithHeadersWithoutBody()
    {
        $client = $this->getGuzzleClient(200);
        $adapter = $this->getGuzzleAdapter($client);
        $adapter->request('GET', '/test.xml', ['headers' => ['X-Test' => 'test']]);
        $this->assertArrayHasKey('X-Test', $adapter->getLastRequest()->getHeaders());
    }

    public function testInvalidRequestWithoutBody()
    {
        $this->expectException(RequestException::class);
        $client = $this->getGuzzleClient(503);
        $adapter = $this->getGuzzleAdapter($client);
        $adapter->request('DELETE', '/test.xml');
    }

    public function testGetClient()
    {
        $this->assertInstanceOf(Client::class, (new GuzzleAdapter('a', 'b'))->getClient());
    }

    private function getGuzzleAdapter(Client $client): GuzzleAdapter
    {
        $adapter = new GuzzleAdapter('test', '123456');
        $adapter->setClient($client);
        return $adapter;
    }

    private function getGuzzleClient($expectedHttpStatusCode, array $expectedHeaders = [], $expectedBody = ''): Client
    {
        $mock = new MockHandler([
            new Response($expectedHttpStatusCode, $expectedHeaders, $expectedBody)
        ]);
        $handler = HandlerStack::create($mock);
        return new Client(['handler' => $handler]);
    }
}
