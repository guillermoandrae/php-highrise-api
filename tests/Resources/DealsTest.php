<?php

namespace GuillermoandraeTest\Highrise\Resources;

use GuillermoandraeTest\Highrise\TestCase;

class DealsTest extends TestCase
{
    public function testFindOpen()
    {
        $body = '<deal><name>test</name></deal>';
        $resource = $this->getMockResource('deals', $body);
        $resource->updateStatus(2, 'won');
        $this->assertSameLastRequestUri('/deals/2/status.xml', $resource);
    }
}
