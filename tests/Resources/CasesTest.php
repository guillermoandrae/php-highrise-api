<?php

namespace GuillermoandraeTest\Highrise\Resources;

use GuillermoandraeTest\Highrise\TestCase;

class CasesTest extends TestCase
{
    public function testFindAll()
    {
        $body = '<kases type="array"><kase><id>1</id></kase><kase><id>2</id></kase></kases>';
        $resource = $this->getMockResource('cases', $body);
        $results = $resource->findAll();
        $this->assertSameLastRequestUri('/kases/open.xml', $resource);
        $this->assertCount(2, $results);
    }

    public function testFindOpen()
    {
        $body = '<kases type="array"><kase><id>1</id></kase><kase><id>2</id></kase></kases>';
        $resource = $this->getMockResource('cases', $body);
        $results = $resource->findOpen();
        $this->assertSameLastRequestUri('/kases/open.xml', $resource);
        $this->assertCount(2, $results);
    }

    public function testFindClosed()
    {
        $body = '<kases type="array"><kase><id>1</id></kase><kase><id>2</id></kase></kases>';
        $resource = $this->getMockResource('cases', $body);
        $results = $resource->findClosed();
        $this->assertSameLastRequestUri('/kases/closed.xml', $resource);
        $this->assertCount(2, $results);
    }
}
