<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class DealsTest extends TestCase
{
    public function testFindOpen()
    {
        $body = $this->getMockModel('deal');
        $resource = $this->getMockRepository('deals', $body);
        $resource->updateStatus(2, 'won');
        $this->assertSameLastRequestUri('/deals/2/status.xml', $resource);
    }
}
