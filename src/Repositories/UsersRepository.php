<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Highrise\Models\ModelInterface;

class UsersRepository extends AbstractRepository
{
    use UnsearchableRepositoryTrait, ReadOnlyRepositoryTrait;

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
