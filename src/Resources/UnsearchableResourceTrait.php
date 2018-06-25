<?php

namespace Guillermoandrae\Highrise\Resources;

use BadMethodCallException;
use Guillermoandrae\Common\CollectionInterface;

trait UnsearchableResourceTrait
{
    final public function search(array $options = []): CollectionInterface
    {
        unset($options);
        throw new BadMethodCallException(
            'The search method of this resource is not supported.'
        );
    }
}
