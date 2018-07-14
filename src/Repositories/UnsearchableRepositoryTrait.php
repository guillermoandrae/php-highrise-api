<?php

namespace Guillermoandrae\Highrise\Repositories;

use BadMethodCallException;
use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Repositories\UnsupportedMethodRepositoryTrait;

trait UnsearchableRepositoryTrait
{
    use UnsupportedMethodRepositoryTrait;

    final public function search(array $options = []): CollectionInterface
    {
        unset($options);
        return $this->callUnsupportedMethod('search');
    }
}
