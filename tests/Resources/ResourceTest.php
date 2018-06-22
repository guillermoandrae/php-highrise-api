<?php

namespace GuillermoandraeTest\Highrise\Resources;

class ResourceTest extends TestCase
{
    public function testFind()
    {
        $id = '12345';
        $resource = $this->getMockResourceFromAbstract("<test><id>$id</id></test>");
        $item = $resource->find($id);
        $this->assertEquals($id, $item['id']);
    }

    public function testFindAll()
    {
        $body = '<tests type="array"><test><id>1</id></test><test><id>2</id></test></tests>';
        $resource = $this->getMockResourceFromAbstract($body);
        $results = $resource->findAll();
        $this->assertCount(2, $results);
    }

    public function testSearch()
    {
        $body = '<tests type="array"><test><id>1</id></test><test><id>2</id></test></tests>';
        $resource = $this->getMockResourceFromAbstract($body);
        $results = $resource->search();
        $this->assertCount(2, $results);
    }

    public function testCreate()
    {
        $name = 'test';
        $body = "<test><name>$name</name></test>";
        $resource = $this->getMockResourceFromAbstract($body);
        $item = $resource->create(['name' => $name]);
        $this->assertSame($name, $item['name']);
    }

    public function testUpdate()
    {
        $name = 'new';
        $body = "<test><name>$name</name></test>";
        $resource = $this->getMockResourceFromAbstract($body);
        $item = $resource->update(5, ['name' => $name]);
        $this->assertSame($name, $item['name']);
    }

    public function testDelete()
    {
        $resource = $this->getMockResourceFromAbstract('', 201);
        $result = $resource->delete(1);
        $this->assertTrue($result);
    }
}
