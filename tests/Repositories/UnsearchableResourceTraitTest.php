<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use Guillermoandrae\Highrise\Repositories\UnsearchableRepositoryTrait;
use GuillermoandraeTest\Highrise\TestCase;

class UnsearchableResourceTraitTest extends TestCase
{
    public function testSearch()
    {
        $this->expectExceptionMessage('The search method of this repository is not supported');
        $repository = $this->getMockForTrait(UnsearchableRepositoryTrait::class);
        $repository->search();
    }
}
