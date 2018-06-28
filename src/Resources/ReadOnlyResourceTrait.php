<?php

namespace Guillermoandrae\Highrise\Resources;

use BadMethodCallException;
use Guillermoandrae\Highrise\Entities\EntityInterface;

trait ReadOnlyResourceTrait
{
    final public function create(array $options): EntityInterface
    {
        unset($options);
        throw new BadMethodCallException(
            'The create method of this resource is not supported.'
        );
    }

    final public function update($id, array $options): EntityInterface
    {
        unset($id, $options);
        throw new BadMethodCallException(
            'The update method of this resource is not supported.'
        );
    }

    final public function delete($id): bool
    {
        unset($id);
        throw new BadMethodCallException(
            'The delete method of this resource is not supported.'
        );
    }
}
