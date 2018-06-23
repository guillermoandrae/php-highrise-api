<?php

namespace Guillermoandrae\Highrise\Http;

use Guillermoandrae\Highrise\Helpers\Xml;
use GuzzleHttp\Exception\BadResponseException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    use CredentialsAwareTrait;

    /**
     * The HTTP client registered with this object.
     *
     * @var mixed
     */
    protected $client;

    /**
     * The last request.
     *
     * @var RequestInterface
     */
    protected $lastRequest;

    /**
     * The last response.
     *
     * @var ResponseInterface
     */
    protected $lastResponse;

    /**
     * Client constructor.
     *
     * @param string $subdomain The account subdomain.
     * @param string $token The authentication token.
     */
    final public function __construct(string $subdomain, string $token)
    {
        $this->setSubdomain($subdomain);
        $this->setToken($token);
    }

    final public function request(string $method, string $uri, array $options = [])
    {
        try {
            $this->send($method, $uri, $options);
            if ($body = (string) $this->getLastResponse()->getBody()) {
                return Xml::parse($body);
            }
            return ($this->getLastResponse()->getStatusCode() == 201);
        } catch (BadResponseException $ex) {
            throw new RequestException($ex->getMessage(), $ex->getCode());
        }
    }

    final public function getLastRequest(): RequestInterface
    {
        return $this->lastRequest;
    }

    final public function getLastResponse(): ResponseInterface
    {
        return $this->lastResponse;
    }

    final public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * Sends and registers the request and registers the response.
     *
     * @param string $method  The HTTP method.
     * @param string $uri  The request URI.
     * @param array $options  The request options.
     */
    abstract protected function send(string $method, string $uri, array $options = []);
}
