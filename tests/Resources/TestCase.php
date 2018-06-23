<?php

namespace GuillermoandraeTest\Highrise\Resources;

use Guillermoandrae\Highrise\Http\AdapterInterface;
use Guillermoandrae\Highrise\Resources\AbstractResource;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

use Guillermoandrae\Highrise\Resources\ResourceFactory;
use Guillermoandrae\Highrise\Resources\ResourceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Guillermoandrae\Highrise\Http\GuzzleAdapter;

class TestCase extends PHPUnitTestCase
{
    protected function getMockResource($resourceName, $body = '', $httpStatusCode = 200): ResourceInterface
    {
        $adapter = $this->getMockAdapter($body, $httpStatusCode);
        return ResourceFactory::factory($resourceName, $adapter);
    }

    protected function getMockResourceFromAbstract($body = '', $httpStatusCode = 200): ResourceInterface
    {
        $adapter = $this->getMockAdapter($body, $httpStatusCode);
        return $this->getMockForAbstractClass(
            AbstractResource::class,
            [$adapter],
            'Tests'
        );
    }

    protected function assertSameLastRequestUri(string $uri, ResourceInterface $resource)
    {
        $this->assertSame($uri, $resource->getAdapter()->getLastRequest()->getUri()->getPath());
    }

    /**
     * @param $body
     * @param $httpStatusCode
     * @return AdapterInterface
     */
    protected function getMockAdapter($body, $httpStatusCode): AdapterInterface
    {
        $mock = new MockHandler([
            new Response($httpStatusCode, [], $body)
        ]);
        $handler = HandlerStack::create($mock);
        $adapter = new GuzzleAdapter('test', '123456');
        $adapter->setClient(new Client(['handler' => $handler]));
        return $adapter;
    }
}
