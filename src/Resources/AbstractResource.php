<?php

namespace Guillermoandrae\Highrise\Resources;

use BadMethodCallException;
use Guillermoandrae\Common\CollectionInterface;
use Guillermoandrae\Highrise\Http\AdapterAwareTrait;
use Guillermoandrae\Highrise\Http\AdapterInterface;

abstract class AbstractResource implements ResourceInterface
{
    use AdapterAwareTrait;

    /**
     * The name used in the resource endpoint.
     *
     * @var string
     */
    protected $name;

    /**
     * Builds the resource object.
     *
     * @param AdapterInterface $adapter The HTTP adapter.
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

    public function findAll(array $options = []): CollectionInterface
    {
        $uri = sprintf('/%s.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri, $options);
    }

    public function search(array $options = []): CollectionInterface
    {
        $uri = sprintf('/%s/search.xml', $this->getName());
        return $this->getAdapter()->request('GET', $uri, $options);
    }

    public function create(array $options): array
    {
        $uri = sprintf('/%s.xml', $this->getName());
        return $this->getAdapter()->request('POST', $uri, $options);
    }

    public function update($id, array $options): array
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

    /**
     * Use this method when one of the other normally available methods should
     * not be supported.
     *
     * @param string $method The method.
     * @throws BadMethodCallException Thrown when invoked.
     */
    protected function deny(string $method)
    {
        throw new BadMethodCallException(
            sprintf('The %s method of this resource is not supported.', $method)
        );
    }
}
