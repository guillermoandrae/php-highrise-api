<?php

namespace Guillermoandrae\Highrise\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class GuzzleAdapter extends AbstractAdapter
{
    public function getClient(): Client
    {
        if (!$this->client) {
            $this->setClient(new Client([
                'base_uri' => sprintf('https://%s.highrisehq.com', $this->getSubdomain()),
                'headers' => [
                    'Content-Type' => 'application/xml',
                    'User-Agent' => static::HEADER_DEFAULT_USER_AGENT,
                ],
                'auth' => [$this->getToken(), $this->getPassword()]
            ]));
        }
        return $this->client;
    }

    protected function send(string $method, string $uri, array $options = [])
    {
        $headers = [];
        if (isset($options['headers'])) {
            $headers = $options['headers'];
            unset($options['headers']);
        }
        $body = '';
        if (isset($options['body'])) {
            $body = $options['body'];
            unset($options['body']);
        }
        $this->lastRequest = new Request($method, $uri, $headers, $body);
        $this->lastResponse = $this->getClient()->send($this->lastRequest, $options);
    }
}
