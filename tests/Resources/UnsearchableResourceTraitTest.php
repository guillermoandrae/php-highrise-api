<?php

namespace GuillermoandraeTest\Highrise\Resources;

use Guillermoandrae\Highrise\Resources\UnsearchableResourceTrait;
use GuillermoandraeTest\Highrise\TestCase;

class UnsearchableResourceTraitTest extends TestCase
{
    public function testSearch()
    {
        $this->expectExceptionMessage('The search method of this resource is not supported');
        $resource = $this->getMockForTrait(UnsearchableResourceTrait::class);
        $resource->search();
    }
}
