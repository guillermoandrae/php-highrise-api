<?php

namespace GuillermoandraeTest\Highrise\Entities;

use Guillermoandrae\Highrise\Entities\Account;
use GuillermoandraeTest\Highrise\TestCase;

class AccountTest extends TestCase
{
    private $entity;

    public function testGetName()
    {
        $this->assertSame('Your Company', $this->entity->getName());
    }

    protected function setUp()
    {
        $this->entity = new Account($this->getAccountXml());
    }
}