<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;

class Account extends AbstractUnsearchableResource
{
    protected $name = 'account';

    /**
     * Returns account information.
     *
     * @return array
     */
    public function show(): array
    {
        $uri = sprintf('/%s.xml', $this->getName());
        return $this->getAdapter()->request('GET', '/account.xml');
    }

    public function find($id): array
    {
        return $this->deny('find');
    }

    public function findAll(array $options = []): CollectionInterface
    {
        return $this->deny('findAll');
    }

    public function create(array $options): array
    {
        return $this->deny('create');
    }

    public function update($id, array $options): array
    {
        return $this->deny('update');
    }

    public function delete($id): bool
    {
        return $this->deny('delete');
    }
}
