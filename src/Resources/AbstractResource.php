<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Highrise\Helpers\Xml;
use Guillermoandrae\Highrise\Http\AdapterAwareTrait;
use Guillermoandrae\Highrise\Http\AdapterInterface;
use ICanBoogie\Inflector;

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
        return $this->getAdapter()->request('GET', $uri, ['query' => $filters]);
    }

    public function search(array $criteria = []): CollectionInterface
    {
        $uri = sprintf('/%s/search.xml', $this->getName());
        $query = [];
        foreach ($criteria as $key => $value) {
            $query[sprintf('criteria[%s]', $key)] = $value;
        }
        return $this->getAdapter()->request('GET', $uri, ['query' => $query]);
    }

    public function create(array $data): array
    {
        $uri = sprintf('/%s.xml', $this->getName());
        $body = Xml::toXml(Inflector::get()->singularize($this->getName()), $data);
        return $this->getAdapter()->request('POST', $uri, ['body' => $body]);
    }

    public function update($id, array $data): array
    {
        $uri = sprintf('/%s/%s.xml?reload=true', $this->getName(), $id);
        $body = Xml::toXml(Inflector::get()->singularize($this->getName()), $data);
        return $this->getAdapter()->request('PUT', $uri, ['body' => $body]);
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
