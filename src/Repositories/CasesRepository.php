<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Common\Collection;
use Guillermoandrae\Common\CollectionInterface;

final class CasesRepository extends AbstractRepository
{
    use UnsearchableRepositoryTrait;

    protected $name = 'kases';

    public function findAll(int $offset = 0, int $limit = null): CollectionInterface
    {
        return $this->findOpen();
    }

    /**
     * Returns all open cases.
     *
     * @return CollectionInterface
     */
    public function findOpen(): CollectionInterface
    {
        $uri = sprintf('/%s/open.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }

    /**
     * Returns all closed cases.
     *
     * @return CollectionInterface
     */
    public function findClosed(): CollectionInterface
    {
        $uri = sprintf('/%s/closed.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }
}
