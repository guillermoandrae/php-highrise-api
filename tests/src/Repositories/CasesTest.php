<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class CasesTest extends TestCase
{
    public function testFindAll()
    {
        $body = $this->getMockModelsXml('case');
        $repository = $this->getMockRepository('cases', $body);
        $results = $repository->findAll();
        $this->assertSameLastRequestUri('/kases/open.xml', $repository);
        $this->assertCount(2, $results);
    }

    public function testFindOpen()
    {
        $body = $this->getMockModelsXml('case');
        $repository = $this->getMockRepository('cases', $body);
        $results = $repository->findOpen();
        $this->assertSameLastRequestUri('/kases/open.xml', $repository);
        $this->assertCount(2, $results);
    }

    public function testFindClosed()
    {
        $body = $this->getMockModelsXml('case');
        $repository = $this->getMockRepository('cases', $body);
        $results = $repository->findClosed();
        $this->assertSameLastRequestUri('/kases/closed.xml', $repository);
        $this->assertCount(2, $results);
    }
}
