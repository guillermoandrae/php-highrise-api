<?php

namespace GuillermoandraeTest\Highrise\Resources;

use Guillermoandrae\Highrise\Resources\Account;
use Guillermoandrae\Highrise\Resources\ResourceFactory;
use GuillermoandraeTest\Highrise\TestCase;

class ResourceFactoryTest extends TestCase
{
    public function testFactory()
    {
        $adapter = $this->getAdapter($this->getMockClient(200));
        $resource = ResourceFactory::factory('account', $adapter);
        $this->assertInstanceOf(Account::class, $resource);
    }

    public function testFactoryWithInvalidResourceName()
    {
        $this->expectExceptionMessage('The test resource does not exist.');
        $adapter = $this->getAdapter($this->getMockClient(200));
        ResourceFactory::factory('test', $adapter);
    }
}
