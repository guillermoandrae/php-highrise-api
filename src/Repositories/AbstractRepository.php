<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Common\Collection;
use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Repositories\AbstractRepository as BaseAbstractRepository;
use Guillermoandrae\Models\ModelInterface as BaseModelInterface;
use Guillermoandrae\Highrise\Helpers\Xml;
use Guillermoandrae\Highrise\Http\AdapterAwareTrait;
use Guillermoandrae\Highrise\Http\AdapterInterface;
use ICanBoogie\Inflector;

abstract class AbstractRepository extends BaseAbstractRepository implements RepositoryInterface
{
    use AdapterAwareTrait;

    /**
     * The name to be used in the resource endpoint.
     *
     * @var string
     */
    protected $name;

    /**
     * The name of the associated model.
     *
     * @var string
     */
    protected $modelName;

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

    public function findById($id): BaseModelInterface
    {
        $uri = sprintf('/%s/%s.xml', $this->getName(), $id);
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }

    public function findWhere(array $where, int $offset = 0, int $limit = null): CollectionInterface
    {
        $uri = sprintf('/%s.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri, ['query' => $where]);
        return $this->hydrate($results);
    }

    public function findAll(int $offset = 0, int $limit = null): CollectionInterface
    {
        $uri = sprintf('/%s.xml', $this->getName());
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }

    public function search(array $criteria = []): CollectionInterface
    {
        $uri = sprintf('/%s/search.xml', $this->getName());
        $query = [];
        if (isset($criteria['term'])) {
            $query['term'] = $criteria['term'];
        } else {
            foreach ($criteria as $key => $value) {
                $query[sprintf('criteria[%s]', $key)] = $value;
            }
        }
        $results = $this->getAdapter()->request('GET', $uri, ['query' => $query]);
        return $this->hydrate($results);

    }

    public function create(array $data): BaseModelInterface
    {
        $uri = sprintf('/%s.xml', $this->getName());
        $body = Xml::toXml(Inflector::get()->singularize($this->getName()), $data);
        $results = $this->getAdapter()->request('POST', $uri, ['body' => $body]);
        return $this->hydrate($results);

    }

    public function update($id, array $data): BaseModelInterface
    {
        $uri = sprintf('/%s/%s.xml?reload=true', $this->getName(), $id);
        $body = Xml::toXml(Inflector::get()->singularize($this->getName()), $data);
        $results = $this->getAdapter()->request('PUT', $uri, ['body' => $body]);
        return $this->hydrate($results);

    }

    public function delete($id): bool
    {
        $uri = sprintf('/%s/%s.xml', $this->getName(), $id);
        return $this->getAdapter()->request('DELETE', $uri);
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getModelName(): string
    {
        return $this->modelName;
    }

    protected function hydrate(string $xml)
    {
        libxml_use_internal_errors(true);
        if (!$obj = simplexml_load_string($xml)) {
            return [];
        }
        if ($obj->attributes()) {
            $items = [];
            foreach ($obj->children() as $child) {
                $items[] = $this->hydrate($child);
            }
            return Collection::make($items);
        }
        return new $this->getModelName()
    }
}
