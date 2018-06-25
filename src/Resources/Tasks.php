<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;

class Tasks extends AbstractRelationalResource
{
    use UnsearchableResourceTrait;

    public function findAll(array $filters = []): CollectionInterface
    {
        $uri = sprintf('/%s/all.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri);
    }

    /**
     * Returns all upcoming tasks assigned to the authenticated user.
     *
     * @return CollectionInterface
     */
    public function findUpcoming(): CollectionInterface
    {
        $uri = sprintf('/%s/upcoming.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri);
    }

    /**
     * Returns all assigned tasks assigned to the authenticated user.
     *
     * @return CollectionInterface
     */
    public function findAssigned(): CollectionInterface
    {
        $uri = sprintf('/%s/assigned.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri);
    }

    /**
     * Returns all completed tasks assigned to the authenticated user.
     *
     * @return CollectionInterface
     */
    public function findCompleted(): CollectionInterface
    {
        $uri = sprintf('/%s/completed.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri);
    }

    /**
     * Returns all of today's tasks assigned to the authenticated user.
     *
     * @return CollectionInterface
     */
    public function findToday(): CollectionInterface
    {
        $uri = sprintf('/%s/today.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri);
    }
}
