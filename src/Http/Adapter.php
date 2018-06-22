<?php

namespace Guillermoandrae\Highrise\Http;

use Guillermoandrae\Highrise\Helpers\Xml;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Adapter implements AdapterInterface
{
    use CredentialsAwareTrait;

    /**
     * The HTTP client.
     *
     * @var Client
     */
    private $client;

    /**
     * The last request.
     *
     * @var RequestInterface
     */
    private $lastRequest;

    /**
     * The last response.
     *
     * @var ResponseInterface
     */
    private $lastResponse;

    /**
     * Client constructor.
     *
     * @param string $subdomain
     * @param string $token
     */
    public function __construct(string $subdomain, string $token)
    {
        $this->setSubdomain($subdomain);
        $this->setToken($token);
    }

    public function request(string $method, string $uri, array $options = [])
    {
        try {
            $this->lastRequest = new Request($method, $uri);
            $this->lastResponse = $this->getClient()->send($this->lastRequest, $options);
            if ($body = (string) $this->getLastResponse()->getBody()) {
                return Xml::parse($body);
            }
            return ($this->getLastResponse()->getStatusCode() == 201);
        } catch (ClientException $ex) {
            throw new RequestException($ex->getMessage(), $ex->getCode());
        }
    }

    public function getLastRequest(): RequestInterface
    {
        return $this->lastRequest;
    }

    public function getLastResponse(): ResponseInterface
    {
        return $this->lastResponse;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function getClient(): Client
    {
        if (!$this->client) {
            $this->setClient(new Client([
                'base_uri' => sprintf('https://%s.highrisehq.com', $this->getSubdomain()),
                'headers' => [
                    'User-Agent' => static::HEADER_USER_AGENT,
                ],
                'auth' => [$this->getToken(), $this->getPassword()]
            ]));
        }
        return $this->client;
    }
}
