<?php

namespace GuillermoandraeTest\Highrise\Resources;

class AccountTest extends TestCase
{
    public function testShow()
    {
        $id = '12345';
        $resource = $this->getMockResource('account', "<account><id>$id</id></account>");
        $account = $resource->show();
        $this->assertSame($id, $account['id']);
    }

    public function testFind()
    {
        $this->expectExceptionMessage('The find method of this resource is not supported');
        $resource = $this->getMockResource('account');
        $resource->find('test');
    }

    public function testFindAll()
    {
        $this->expectExceptionMessage('The findAll method of this resource is not supported');
        $resource = $this->getMockResource('account');
        $resource->findAll();
    }

    public function testSearch()
    {
        $this->expectExceptionMessage('The search method of this resource is not supported');
        $resource = $this->getMockResource('account');
        $resource->search();
    }

    public function testCreate()
    {
        $this->expectExceptionMessage('The create method of this resource is not supported');
        $resource = $this->getMockResource('account');
        $resource->create([]);
    }

    public function testUpdate()
    {
        $this->expectExceptionMessage('The update method of this resource is not supported');
        $resource = $this->getMockResource('account');
        $resource->update('test', []);
    }

    public function testDelete()
    {
        $this->expectExceptionMessage('The delete method of this resource is not supported');
        $resource = $this->getMockResource('account');
        $resource->delete('test');
    }
}
