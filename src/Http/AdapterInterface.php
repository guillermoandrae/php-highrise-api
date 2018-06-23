<?php

namespace Guillermoandrae\Highrise\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface AdapterInterface
{
    /**
     * The default value for the User-Agent header.
     *
     * @const string
     */
    const HEADER_DEFAULT_USER_AGENT = 'Highrise API PHP Client (https://github.com/guillermoandrae/php-highrise-api)';

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
     * Returns the last request made with this adapter.
     *
     * @return RequestInterface
     */
    public function getLastRequest(): RequestInterface;

    /**
     * Returns the last response received by this adapter.
     *
     * @return ResponseInterface
     */
    public function getLastResponse(): ResponseInterface;

    /**
     * Registers the HTTP client with this object.
     *
     * @param mixed $client  The HTTP client.
     */
    public function setClient($client);

    /**
     * Returns the HTTP client registered with this object.
     *
     * @return mixed
     */
    public function getClient();
}
