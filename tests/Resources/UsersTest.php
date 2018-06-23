<?php

namespace GuillermoandraeTest\Highrise\Resources;

class UsersTest extends TestCase
{
    public function testMe()
    {
        $resource = $this->getMockResource('users', '<user><id>1</id></user>');
        $resource->me();
        $this->assertSameLastRequestUri('/me.xml', $resource);
    }
}
