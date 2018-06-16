<?php

namespace Guillermoandrae\Highrise\Http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Response;
use RuntimeException;

class Client implements ClientInterface
{
    use CredentialsAwareTrait;

    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

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
        $this->setGuzzleClient(new GuzzleClient([
            'base_uri' => sprintf('https://%s.highrisehq.com', $this->getSubdomain())
        ]));
    }

    public function setGuzzleClient(GuzzleClient $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    public function request(string $method, string $uri, array $options = [])
    {
        $response = $this->guzzleClient->request($method, $uri, array_merge($options, [
            'headers' => [
                'User-Agent' => "Highrise API PHP Client",
            ],
            'auth' => [$this->getToken(), 'X']
        ]));
        return $this->parseResponse($response);
    }

    protected function parseResponse(Response $response)
    {
        if ($response->getStatusCode() >= 400) {
            throw new RuntimeException($response->getReasonPhrase());
        }
        $xml = (string) $response->getBody();
        $result = json_decode(json_encode(simplexml_load_string($xml)));
        return $result;
    }
}
