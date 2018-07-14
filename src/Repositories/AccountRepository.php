<?php

namespace Guillermoandrae\Highrise\Repositories;

use BadMethodCallException;
use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Highrise\Models\ModelInterface;
use Guillermoandrae\Models\ModelInterface as BaseModelInterface;
use Guillermoandrae\Repositories\ReadOnlyRepositoryTrait;

class AccountRepository extends AbstractRepository
{
    use UnsearchableRepositoryTrait, ReadOnlyRepositoryTrait {
        UnsearchableRepositoryTrait::callUnsupportedMethod insteadof ReadOnlyRepositoryTrait;
    }

    protected $name = 'account';

    /**
     * Returns account information.
     *
     * @return ModelInterface
     */
    public function show(): ModelInterface
    {
        $result = $this->getAdapter()->request('GET', '/account.xml');
        return $this->hydrate($result);
    }

    public function findById($id): BaseModelInterface
    {
        return $this->callUnsupportedMethod('findById');
    }

    public function findAll(int $offset = 0, int $limit = null): CollectionInterface
    {
        return $this->callUnsupportedMethod('findAll');
    }
}
