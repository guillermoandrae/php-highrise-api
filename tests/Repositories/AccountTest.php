<?php

namespace GuillermoandraeTest\Highrise\Repositories;

use Guillermoandrae\Highrise\Repositories\AccountRepository;
use GuillermoandraeTest\Highrise\TestCase;

class AccountTest extends TestCase
{
    /**
     * @var AccountRepository
     */
    private $resource;

    public function testShow()
    {
        $account = $this->resource->show();
        $this->assertSame('Your Company', $account->getName());
    }

    public function testFind()
    {
        $this->expectExceptionMessage('The findById method of this repository is not supported');
        $this->resource->find('test');
    }

    public function testFindAll()
    {
        $this->expectExceptionMessage('The findAll method of this repository is not supported');
        $this->resource->findAll();
    }

    public function testSearch()
    {
        $this->expectExceptionMessage('The search method of this repository is not supported');
        $this->resource->search();
    }

    protected function setUp()
    {
        $client = $this->getMockClient(
            200,
            [],
            $this->getMockModelXml('account')
        );
        $this->resource = new AccountRepository($this->getAdapter($client));
    }
}
