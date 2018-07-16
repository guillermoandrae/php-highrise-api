<?php

namespace GuillermoandraeTest\Highrise\Http;

use Guillermoandrae\Highrise\Http\GuzzleAdapter;
use Guillermoandrae\Highrise\Http\RequestException;
use GuillermoandraeTest\Highrise\TestCase;
use GuzzleHttp\Client;

class GuzzleAdapterTest extends TestCase
{
    public function testRequestWithBody()
    {
        $body = '<test><name>test</name></test>';
        $client = $this->getMockClient(201);
        $adapter = $this->getAdapter($client);
        $adapter->request('GET', '/test.xml', ['body' => $body]);
        $this->assertSame($body, (string) $adapter->getLastRequest()->getBody());
    }

    public function testRequestWithoutBody()
    {
        $client = $this->getMockClient(200);
        $adapter = $this->getAdapter($client);
        $adapter->request('DELETE', '/test.xml');
        $this->assertEmpty((string) $adapter->getLastRequest()->getBody());
    }

    public function testRequestWithHeadersWithoutBody()
    {
        $client = $this->getMockClient(200);
        $adapter = $this->getAdapter($client);
        $adapter->request('GET', '/test.xml', ['headers' => ['X-Test' => 'test']]);
        $this->assertArrayHasKey('X-Test', $adapter->getLastRequest()->getHeaders());
    }

    public function testInvalidRequestWithoutBody()
    {
        $this->expectException(RequestException::class);
        $client = $this->getMockClient(503);
        $adapter = $this->getAdapter($client);
        $adapter->request('DELETE', '/test.xml');
    }

    public function testGetClient()
    {
        $this->assertInstanceOf(Client::class, (new GuzzleAdapter('a', 'b'))->getClient());
    }
}
