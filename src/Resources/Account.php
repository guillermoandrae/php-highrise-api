<?php

namespace Guillermoandrae\Highrise\Resources;

use BadMethodCallException;
use Guillermoandrae\Common\CollectionInterface;

class Account extends AbstractResource
{
    use UnsearchableResourceTrait, ReadOnlyResourceTrait;

    protected $name = 'account';

    /**
     * Returns account information.
     *
     * @return array
     */
    public function show(): array
    {
        return $this->getAdapter()->request('GET', '/account.xml');
    }

    public function find($id): array
    {
        throw new BadMethodCallException(
            'The find method of this resource is not supported.'
        );
    }

    public function findAll(array $options = []): CollectionInterface
    {
        throw new BadMethodCallException(
            'The findAll method of this resource is not supported.'
        );
    }
}
