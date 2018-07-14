<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Common\CollectionInterface;

abstract class AbstractRelationalRepository extends AbstractRepository
{
    /**
     * Returns all upcoming tasks assigned to the authenticated user related to
     * a person, company, case, or deal.
     *
     * @param string $name The name of the resource for which tasks should be
     *                     returned.
     * @param mixed $id The resource ID.
     * @param array $filters  The request filters.
     * @return CollectionInterface
     */
    public function findBy(string $name, $id, array $filters = []): CollectionInterface
    {
        $uri = sprintf('/%s/%s/%s.xml', $name, $id, $this->getName());
        $results = $this->getAdapter()->request('GET', $uri, ['query' => $filters]);
        return $this->hydrate($results);
    }
}
