<?php

namespace GuillermoandraeTest\Highrise\Models;

use Guillermoandrae\Highrise\Models\AccountModel;
use GuillermoandraeTest\Highrise\TestCase;

class AccountTest extends TestCase
{
    private $model;

    public function testGetName()
    {
        $this->assertSame('Your Company', $this->model->getName());
    }

    protected function setUp()
    {
        $this->model = new AccountModel($this->getMockModel('account'));
    }
}