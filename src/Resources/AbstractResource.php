<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Highrise\Http\AdapterAwareTrait;
use Guillermoandrae\Highrise\Http\AdapterInterface;

abstract class AbstractResource implements ResourceInterface
{
    use AdapterAwareTrait;

    /**
     * The name to be used in the resource endpoint.
     *
     * @var string
     */
    protected $name;

    /**
     * Builds the resource object.
     *
     * @param AdapterInterface $adapter  The HTTP adapter.
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->setAdapter($adapter);
        if (!$this->name) {
            $this->name = strtolower(
                str_replace(__NAMESPACE__ . '\\', '', get_class($this))
            );
        }
    }

    public function find($id): array
    {
        $uri = sprintf('/%s/%s.xml', $this->getName(), $id);
        return $this->getAdapter()->request('GET', $uri);
    }

    public function findAll(array $filters = []): CollectionInterface
    {
        $uri = sprintf('/%s.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri, $filters);
    }

    public function search(array $criteria = []): CollectionInterface
    {
        $uri = sprintf('/%s/search.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri, $criteria);
    }

    public function create(array $data): array
    {
        $uri = sprintf('/%s.xml', $this->getName());
        return $this->getAdapter()->request('POST', $uri, $data);
    }

    public function update($id, array $data): array
    {
        $uri = sprintf('/%s/%s.xml?reload=true', $this->getName(), $id);
        return $this->getAdapter()->request('PUT', $uri);
    }

    public function delete($id): bool
    {
        $uri = sprintf('/%s/%s.xml', $this->getName(), $id);
        return $this->getAdapter()->request('DELETE', $uri);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
