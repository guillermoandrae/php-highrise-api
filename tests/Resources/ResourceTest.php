<?php

namespace GuillermoandraeTest\Highrise\Resources;

use Guillermoandrae\Highrise\Http\AdapterInterface;
use Guillermoandrae\Highrise\Repositories\AbstractRepository;
use Guillermoandrae\Highrise\Repositories\RepositoryInterface;
use GuillermoandraeTest\Highrise\TestCase;

class ResourceTest extends TestCase
{
    public function testFind()
    {
        $id = '12345';
        $expectedBody = sprintf('<test><id>%s</id></test>', $id);
        $adapter = $this->getAdapter($this->getMockClient(200, [], $expectedBody));
        $resource = $this->getResource($adapter);
        $item = $resource->find($id);
        $this->assertEquals($id, $item['id']);
    }

    public function testFindAll()
    {
        $expectedBody = '<tests type="array"><test><id>1</id></test><test><id>2</id></test></tests>';
        $adapter = $this->getAdapter($this->getMockClient(200, [], $expectedBody));
        $resource = $this->getResource($adapter);
        $this->assertCount(2, $resource->findAll());
    }

    public function testSearchWithTerm()
    {
        $expectedBody = '<tests type="array"><test><id>1</id></test><test><id>2</id></test></tests>';
        $adapter = $this->getAdapter($this->getMockClient(200, [], $expectedBody));
        $resource = $this->getResource($adapter);
        $resource->search(['term' => 'test']);
        $actualQuery = $resource->getAdapter()->getLastRequest()->getUri()->getQuery();
        $this->assertSame(http_build_query(['term' => 'test']), $actualQuery);
    }

    public function testSearchWithCriteria()
    {
        $expectedBody = '<tests type="array"><test><id>1</id></test><test><id>2</id></test></tests>';
        $adapter = $this->getAdapter($this->getMockClient(200, [], $expectedBody));
        $resource = $this->getResource($adapter);
        $resource->search(['test' => 'test']);
        $actualQuery = $resource->getAdapter()->getLastRequest()->getUri()->getQuery();
        $this->assertSame(http_build_query(['criteria[test]' => 'test']), $actualQuery);
    }

    public function testCreate()
    {
        $expectedBody = '<test><name>test</name></test>';
        $adapter = $this->getAdapter($this->getMockClient(201, [], $expectedBody));
        $resource = $this->getResource($adapter);
        $results = $resource->create(['name' => 'test']);
        $this->assertArrayHasKey('name', $results);
        $this->assertSame($expectedBody, (string) $resource->getAdapter()->getLastRequest()->getBody());
    }

    public function testUpdate()
    {
        $expectedBody = '<test><name>test</name></test>';
        $adapter = $this->getAdapter($this->getMockClient(201, [], $expectedBody));
        $resource = $this->getResource($adapter);
        $results = $resource->update('123456', ['name' => 'test']);
        $this->assertArrayHasKey('name', $results);
        $this->assertSame($expectedBody, (string) $resource->getAdapter()->getLastRequest()->getBody());
    }

    public function testDelete()
    {
        $adapter = $this->getAdapter($this->getMockClient(200));
        $resource = $this->getResource($adapter);
        $this->assertTrue($resource->delete('123456'));
    }

    private function getResource(AdapterInterface $adapter): RepositoryInterface
    {
        return $this->getMockForAbstractClass(
            AbstractRepository::class,
            [$adapter],
            'Tests'
        );
    }
}
