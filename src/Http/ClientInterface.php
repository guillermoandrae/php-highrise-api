<?php

namespace Guillermoandrae\Highrise\Http;

interface ClientInterface
{
    public function request(string $method, string $uri, array $options = []);
}
