<?php

namespace GuillermoandraeTest\Highrise\Helpers;

use Guillermoandrae\Highrise\Helpers\Xml;
use PHPUnit\Framework\TestCase;

class XmlTest extends TestCase
{
    public function testParseInvalidString()
    {
        $this->assertEmpty(Xml::parse('<yo>'));
    }
}
