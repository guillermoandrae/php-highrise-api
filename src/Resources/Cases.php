<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\Collection;
use Guillermoandrae\Common\CollectionInterface;

final class Cases extends AbstractResource
{
    use UnsearchableResourceTrait;

    protected $name = 'kases';

    public function findAll(array $filters = []): CollectionInterface
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
        return $this->getAdapter()->request('GET', $uri);
    }

    /**
     * Returns all closed cases.
     *
     * @return CollectionInterface
     */
    public function findClosed(): CollectionInterface
    {
        $uri = sprintf('/%s/closed.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri);
    }
}
