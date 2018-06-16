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
     * Returns the subdomain.
     *
     * @return string
     */
    public function getSubdomain(): string
    {
        return $this->subdomain;
    }

    /**
     * Registers the subdomain with this object.
     *
     * @param string $subdomain
     * @return null
     */
    public function setSubdomain(string $subdomain)
    {
        $this->subdomain = $subdomain;
    }

    /**
     * Returns the token.
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Registers the token with this object.
     *
     * @param string $token
     * @return null
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }
}
