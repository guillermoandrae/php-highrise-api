<?php

namespace Guillermoandrae\Highrise\Resources;

use BadMethodCallException;
use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Highrise\Entities\EntityInterface;

class Account extends AbstractResource
{
    use UnsearchableResourceTrait, ReadOnlyResourceTrait;

    protected $name = 'account';

    /**
     * Returns account information.
     *
     * @return EntityInterface
     */
    public function show(): EntityInterface
    {
        $result = $this->getAdapter()->request('GET', '/account.xml');
        return $this->hydrate($result);
    }

    public function find($id): EntityInterface
    {
        throw new BadMethodCallException(
            'The find method of this resource is not supported.'
        );
    }

    public function findAll(array $filters = []): CollectionInterface
    {
        throw new BadMethodCallException(
            'The findAll method of this resource is not supported.'
        );
    }
}
