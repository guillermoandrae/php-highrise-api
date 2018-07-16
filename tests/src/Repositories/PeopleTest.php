<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use GuillermoandraeTest\Highrise\TestCase;

class PeopleTest extends TestCase
{
    public function testFindByCompanyId()
    {
        $id = 10;
        $body = '<people type="array"><person>1</person></people>';
        $repository = $this->getMockRepository('people', $body);
        $repository->findByCompanyId($id);
        $this->assertSameLastRequestUri("/companies/$id/people.xml", $repository);
    }
}
