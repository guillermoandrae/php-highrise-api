<?php

namespace GuillermoandraeTest\Highrise\Resources;

use Guillermoandrae\Highrise\Resources\ReadOnlyResourceTrait;
use GuillermoandraeTest\Highrise\TestCase;

class ReadOnlyResourceTraitTest extends TestCase
{
    /**
     * @var ReadOnlyResourceTrait
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
        $this->resource = $this->getMockForTrait(ReadOnlyResourceTrait::class);
    }
}
