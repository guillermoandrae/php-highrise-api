<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use Guillermoandrae\Highrise\Repositories\ReadOnlyRepositoryTrait;
use GuillermoandraeTest\Highrise\TestCase;

class ReadOnlyResourceTraitTest extends TestCase
{
    /**
     * @var ReadOnlyRepositoryTrait
     */
    private $resource;

    public function testCreate()
    {
        $this->expectExceptionMessage('The create method of this resource is not supported');
        $this->resource->create([]);
    }

    public function testUpdate()
    {
        $this->expectExceptionMessage('The update method of this resource is not supported');
        $this->resource->update('test', []);
    }

    public function testDelete()
    {
        $this->expectExceptionMessage('The delete method of this resource is not supported');
        $this->resource->delete('test');
    }

    protected function setUp()
    {
        $this->resource = $this->getMockForTrait(ReadOnlyRepositoryTrait::class);
    }
}
