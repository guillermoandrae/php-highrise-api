<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class PeopleTest extends TestCase
{
    public function testFindByCompanyId()
    {
        $id = 10;
        $body = '<people type="array"><person>1</person></people>';
        $resource = $this->getMockResource('people', $body);
        $resource->findByCompanyId($id);
        $this->assertSameLastRequestUri("/companies/$id/people.xml", $resource);
    }
}
