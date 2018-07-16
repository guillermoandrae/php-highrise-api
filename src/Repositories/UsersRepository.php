<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Highrise\Models\ModelInterface;
use Guillermoandrae\Repositories\ReadOnlyRepositoryTrait;

class UsersRepository extends AbstractRepository
{
    use UnsearchableRepositoryTrait, ReadOnlyRepositoryTrait {
        UnsearchableRepositoryTrait::callUnsupportedMethod insteadof ReadOnlyRepositoryTrait;
    }

    /**
     * Returns the current user's information.
     *
     * @return ModelInterface
     */
    public function me(): ModelInterface
    {
        $results = $this->getAdapter()->request('GET', '/me.xml');
        return $this->hydrate($results);
    }
}
