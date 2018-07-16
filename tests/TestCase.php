<?php

namespace GuillermoandraeTest\Highrise;

use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Highrise\Http\GuzzleAdapter;
use Guillermoandrae\Highrise\Repositories\RepositoryInterface;
use Guillermoandrae\Repositories\RepositoryFactory;
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

    protected function getMockRepository(string $name, string $expectedBody)
    {
        $client = $this->getMockClient(200, [], $expectedBody);
        $adapter = $this->getAdapter($client);
        RepositoryFactory::setNamespace('Guillermoandrae\Highrise\Repositories');
        return RepositoryFactory::factory($name, $adapter);
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

    protected function getMockModelsXml(string $name, $count = 2): string
    {
        $models = '<mock type="array">';
        for ($index = 0; $index < $count; $index++) {
            $models .= $this->getMockModelXml($name);
        }
        $models .= '</mock>';
        return $models;
    }

    protected function getMockModelXml(string $name): string
    {
        $path = sprintf('%s/Mocks/%s.xml', __DIR__, $name);
        return file_get_contents($path);
    }
}
