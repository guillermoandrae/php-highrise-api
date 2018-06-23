<?php

namespace GuillermoandraeTest\Highrise\Http;

use Guillermoandrae\Highrise\Http\CredentialsAwareTrait;
use PHPUnit\Framework\TestCase;

class CredentialsAwareTraitTest extends TestCase
{
    /**
     * @var CredentialsAwareTrait
     */
    private $trait;

    public function testSetGetSubdomain()
    {
        $subdomain = 'test';
        $this->trait->setSubdomain($subdomain);
        $this->assertSame($subdomain, $this->trait->getSubdomain());
    }

    public function testSetGetToken()
    {
        $token = 'test';
        $this->trait->setToken($token);
        $this->assertSame($token, $this->trait->getToken());
    }

    public function testSetGetPassword()
    {
        $password = 'test';
        $this->trait->setPassword($password);
        $this->assertSame($password, $this->trait->getPassword());
    }

    protected function setUp()
    {
        $this->trait = $this->getMockForTrait(CredentialsAwareTrait::class);
    }
}
