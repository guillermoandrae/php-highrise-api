<?php

namespace GuillermoandraeTest\Highrise\Client;

use BadMethodCallException;
use Guillermoandrae\Highrise\Client\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testInvalidResource()
    {
        $this->expectException(BadMethodCallException::class);
        (new Client())->you();
    }
}
