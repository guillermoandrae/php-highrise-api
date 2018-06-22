<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;

abstract class AbstractUnsearchableResource extends AbstractResource
{
    final public function search(array $options = []): CollectionInterface
    {
        return $this->deny('search');
    }
}
