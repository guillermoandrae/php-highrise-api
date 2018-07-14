<?php

namespace GuillermoandraeTest\Highrise\Resources;

use Guillermoandrae\Highrise\Repositories\UnsearchableRepositoryTrait;
use GuillermoandraeTest\Highrise\TestCase;

class UnsearchableResourceTraitTest extends TestCase
{
    public function testSearch()
    {
        $this->expectExceptionMessage('The search method of this resource is not supported');
        $resource = $this->getMockForTrait(UnsearchableRepositoryTrait::class);
        $resource->search();
    }
}
