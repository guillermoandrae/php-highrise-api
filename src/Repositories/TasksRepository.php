<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Common\CollectionInterface;

class TasksRepository extends AbstractRelationalRepository
{
    use UnsearchableRepositoryTrait;

    public function findAll(array $filters = []): CollectionInterface
    {
        $uri = sprintf('/%s/all.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri, ['query' => $filters]);
        return $this->hydrate($results);
    }

    /**
     * Returns all upcoming tasks assigned to the authenticated user.
     *
     * @return CollectionInterface
     */
    public function findUpcoming(): CollectionInterface
    {
        $uri = sprintf('/%s/upcoming.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }

    /**
     * Returns all assigned tasks assigned to the authenticated user.
     *
     * @return CollectionInterface
     */
    public function findAssigned(): CollectionInterface
    {
        $uri = sprintf('/%s/assigned.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }

    /**
     * Returns all completed tasks assigned to the authenticated user.
     *
     * @return CollectionInterface
     */
    public function findCompleted(): CollectionInterface
    {
        $uri = sprintf('/%s/completed.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }

    /**
     * Returns all of today's tasks assigned to the authenticated user.
     *
     * @return CollectionInterface
     */
    public function findToday(): CollectionInterface
    {
        $uri = sprintf('/%s/today.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }
}
