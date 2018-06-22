<?php

namespace GuillermoandraeTest\Highrise\Resources;

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
}
