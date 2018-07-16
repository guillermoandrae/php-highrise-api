<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class UsersTest extends TestCase
{
    public function testMe()
    {
        $repository = $this->getMockRepository('users', '<user><id>1</id></user>');
        $repository->me();
        $this->assertSameLastRequestUri('/me.xml', $repository);
    }
}
