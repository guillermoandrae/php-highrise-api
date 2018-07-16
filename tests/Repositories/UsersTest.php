<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class UsersTest extends TestCase
{
    public function testMe()
    {
        $repository = $this->getMockRepository('users', $this->getMockModelXml('user'));
        $repository->me();
        $this->assertSameLastRequestUri('/me.xml', $repository);
    }
}
