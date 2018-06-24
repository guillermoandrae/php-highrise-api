<?php

namespace GuillermoandraeTest\Highrise\Helpers;

use Guillermoandrae\Highrise\Helpers\Xml;
use PHPUnit\Framework\TestCase;

class XmlTest extends TestCase
{
    public function testToXml()
    {
        $expectedXml = '<test><name>test</name></test>';
        $this->assertSame($expectedXml, Xml::toXml('test', ['name' => 'test']));
    }

    public function testFromXml()
    {
        $this->assertSame(['name' => 'test'], Xml::fromXml('<test><name>test</name></test>'));
    }

    public function testFromXmlInvalidString()
    {
        $this->assertEmpty(Xml::fromXml('<yo>'));
    }
}
