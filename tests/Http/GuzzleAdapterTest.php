<?php

namespace GuillermoandraeTest\Highrise\Http;

use Guillermoandrae\Highrise\Http\AdapterInterface;
use Guillermoandrae\Highrise\Http\GuzzleAdapter;
use Guillermoandrae\Highrise\Http\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GuzzleAdapterTest extends TestCase
{
    /**
     * @var AdapterInterface
     */
    private $adapter;

    public function testRequestWithBody()
    {
        $body = '<test><name>test</name></test>';
        $this->assertRequest(200, 'GET', [], $body);
    }

    public function testRequestWithoutBody()
    {
        $this->assertRequest(201, 'DELETE');
    }

    public function testInvalidRequestWithoutBody()
    {
        $this->expectException(RequestException::class);
        $this->assertRequest(503, 'GET');
    }

    public function testGetClient()
    {
        $this->assertInstanceOf(Client::class, $this->adapter->getClient());
    }

    protected function setUp()
    {
        $this->adapter = new GuzzleAdapter('test', '123456');
    }

    private function assertRequest($httpStatusCode, string $method, array $options = [], $body = '')
    {
        $uri = '/test.xml';
        $mock = new MockHandler([
            new Response($httpStatusCode, [], $body)
        ]);
        $handler = HandlerStack::create($mock);
        $this->adapter->setClient(new Client(['handler' => $handler]));
        $this->adapter->request($method, $uri, $options);
        $this->assertSame($uri, $this->adapter->getLastRequest()->getUri()->getPath());
        $this->assertSame($body, (string) $this->adapter->getLastResponse()->getBody());
    }
}
