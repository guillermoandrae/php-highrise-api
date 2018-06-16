<?php

namespace Guillermoandrae\Highrise\Http;

trait ClientAwareTrait
{
    /**
     * The HTTP client.
     *
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * Client constructor.
     *
     * @param ClientInterface $httpClient  The HTTP client.
     */
    final public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Returns the HTTP client.
     *
     * @return ClientInterface
     */
    final public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }
}
