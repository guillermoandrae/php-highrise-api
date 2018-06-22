<?php

namespace Guillermoandrae\Highrise\Http;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface AdapterInterface
{
    /**
     * The value for the User-Agent header.
     *
     * @const string
     */
    const HEADER_USER_AGENT = 'Highrise API PHP Client';

    /**
     * Makes requests using the registered HTTP client.
     *
     * @param string $method  The HTTP method.
     * @param string $uri  The request URI.
     * @param array $options  The request options.
     * @return mixed
     * @throws RequestException  Thrown when an error occurs during the request.
     */
    public function request(string $method, string $uri, array $options = []);

    /**
     * Returns the last request.
     *
     * @return RequestInterface
     */
    public function getLastRequest(): RequestInterface;

    /**
     * Returns the last response.
     *
     * @return ResponseInterface
     */
    public function getLastResponse(): ResponseInterface;

    /**
     * Registers the HTTP client with this object.
     *
     * @param Client $client  The HTTP client.
     */
    public function setClient(Client $client);

    /**
     * Returns the HTTP client registered with this object.
     *
     * @return Client
     */
    public function getClient(): Client;
}
