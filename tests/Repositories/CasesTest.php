<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class CasesTest extends TestCase
{
    public function testFindAll()
    {
        $body = $this->getMockModels('case');
        $resource = $this->getMockRepository('cases', $body);
        $results = $resource->findAll();
        $this->assertSameLastRequestUri('/kases/open.xml', $resource);
        $this->assertCount(2, $results);
    }

    public function testFindOpen()
    {
        $body = $this->getMockModels('case');
        $resource = $this->getMockRepository('cases', $body);
        $results = $resource->findOpen();
        $this->assertSameLastRequestUri('/kases/open.xml', $resource);
        $this->assertCount(2, $results);
    }

    public function testFindClosed()
    {
        $body = $this->getMockModels('case');
        $resource = $this->getMockRepository('cases', $body);
        $results = $resource->findClosed();
        $this->assertSameLastRequestUri('/kases/closed.xml', $resource);
        $this->assertCount(2, $results);
    }
}
