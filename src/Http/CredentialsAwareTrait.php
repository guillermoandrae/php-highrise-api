<?php

namespace Guillermoandrae\Highrise\Http;

trait CredentialsAwareTrait
{
    /**
     * The account subdomain.
     *
     * @var string
     */
    protected $subdomain;

    /**
     * The authentication token.
     *
     * @var string
     */
    protected $token;

    /**
     * The password to use for authentication.
     *
     * @var string
     */
    protected $password = 'X';

    /**
     * Returns the subdomain registered with this object.
     *
     * @return string
     */
    final public function getSubdomain(): string
    {
        return $this->subdomain;
    }

    /**
     * Registers the subdomain with this object.
     *
     * @param string $subdomain The subdomain.
     */
    final public function setSubdomain(string $subdomain)
    {
        $this->subdomain = $subdomain;
    }

    /**
     * Returns the token registered with this object.
     *
     * @return string
     */
    final public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Registers the token with this object.
     *
     * @param string $token
     * @return null
     */
    final public function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * Returns the password registered with this object.
     *
     * @return string
     */
    final public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Registers the password with this object.
     *
     * @param string $password  The password to use for authentication.
     */
    final public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
