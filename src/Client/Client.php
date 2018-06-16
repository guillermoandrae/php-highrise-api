<?php

namespace Guillermoandrae\Highrise\Client;

use BadMethodCallException;
use Guillermoandrae\Highrise\Http\Client as HttpClient;
use Guillermoandrae\Highrise\Http\ClientAwareTrait;
use Guillermoandrae\Highrise\Http\ClientInterface;
use Guillermoandrae\Highrise\Http\CredentialsAwareTrait;
use Guillermoandrae\Highrise\Resources;
use Guillermoandrae\Highrise\Resources\ResourceFactory;
use Guillermoandrae\Highrise\Resources\ResourceInterface;

/**
 * Class Client
 *
 * @method Resources\Account account()
 * @method Resources\Cases cases()
 * @method Resources\Comments comments()
 * @method Resources\Companies companies()
 * @method Resources\Deals deals()
 * @method Resources\Notes notes()
 * @method Resources\People people()
 * @method Resources\Tasks tasks()
 * @method Resources\Users users()
 */
class Client
{
    use ClientAwareTrait, CredentialsAwareTrait;

    /**
     * @var ClientInterface
     */
    private $defaultHttpClient;

    /**
     * Client constructor.
     *
     * @param string $subdomain
     * @param string $token
     */
    public function __construct(string $subdomain = '', string $token = '')
    {
        $this->setSubdomain($subdomain);
        $this->setToken($token);
    }

    public function __call($name, $arguments)
    {
        try {
            return $this->resource($name);
        } catch (\Exception $ex) {
            throw new BadMethodCallException(sprintf('The %s method does not exist.', $name));
        }
    }

    /**
     * Returns the desired resource.
     *
     * @param string $name  The name of the desired resource.
     * @return ResourceInterface
     */
    public function resource(string $name): ResourceInterface
    {
        if (!$client = $this->httpClient) {
            $this->setHttpClient($this->getDefaultHttpClient());
        }
        return ResourceFactory::factory($name, $this->getHttpClient());
    }

    /**
     * @return ClientInterface
     */
    public function getDefaultHttpClient(): ClientInterface
    {
        if (!$this->defaultHttpClient) {
            $this->defaultHttpClient = new HttpClient($this->getSubdomain(), $this->getToken());
        }
        return $this->defaultHttpClient;
    }
}
