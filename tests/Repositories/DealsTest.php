<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class DealsTest extends TestCase
{
    public function testFindOpen()
    {
        $body = '<deal>
  <account-id type="integer"></account-id>
  <author-id type="integer"></author-id>
  <background></background>
  <category-id type="integer"></category-id>
  <created-at type="datetime"></created-at>
  <currency></currency>
  <duration type="integer"></duration>
  <group-id type="integer"></group-id>
  <name></name>
  <owner-id type="integer"></owner-id>
  <party-id type="integer"></party-id>
  <price type="integer"></price>
  <price-type></price-type>
  <responsible-party-id type="integer"></responsible-party-id>
  <status></status>
  <status-changed-on type="date"></status-changed-on>
  <updated-at type="datetime"></updated-at>
  <visible-to>Everyone</visible-to>
</deal>';
        $resource = $this->getMockResource('deals', $body);
        $resource->updateStatus(2, 'won');
        $this->assertSameLastRequestUri('/deals/2/status.xml', $resource);
    }
}
