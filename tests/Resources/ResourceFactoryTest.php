<?php

namespace GuillermoandraeTest\Highrise\Resources;

use Guillermoandrae\Highrise\Repositories\AccountRepository;
use Guillermoandrae\Highrise\Repositories\ResourceFactory;
use GuillermoandraeTest\Highrise\TestCase;

class ResourceFactoryTest extends TestCase
{
    public function testFactory()
    {
        $adapter = $this->getAdapter($this->getMockClient(200));
        $resource = ResourceFactory::factory('account', $adapter);
        $this->assertInstanceOf(AccountRepository::class, $resource);
    }

    public function testFactoryWithInvalidResourceName()
    {
        $this->expectExceptionMessage('The test resource does not exist.');
        $adapter = $this->getAdapter($this->getMockClient(200));
        ResourceFactory::factory('test', $adapter);
    }
}
