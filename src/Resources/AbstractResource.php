<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\Collection;
use Guillermoandrae\Highrise\Http\ClientAwareTrait;
use Guillermoandrae\Highrise\Http\ClientInterface;

abstract class AbstractResource implements ResourceInterface
{
    use ClientAwareTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * AbstractResource constructor.
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->setHttpClient($httpClient);
        $this->name = strtolower(str_replace(__NAMESPACE__ . '\\', '', get_class($this)));
    }

    public function fetch($id)
    {
        $uri = sprintf('/%s/%s.xml', $this->getName(), $id);
        return $this->getHttpClient()->request('GET', $uri);
    }

    public function search(array $options = []): Collection
    {
        $uri = sprintf('/%s.xml', $this->getName());
        return $this->getHttpClient()->request('GET', $uri);
    }

    public function create(array $options): bool
    {
    }

    public function update($id, array $options)
    {
        $uri = sprintf('/%s/%s.xml?reload=true', $this->getName(), $id);
        $this->getHttpClient()->request('PUT', $uri);
    }

    public function delete($id): bool
    {
        $uri = sprintf('/%s/%s.xml', $this->getName(), $id);
        $this->getHttpClient()->request('DELETE', $uri);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
