<?php

namespace Guillermoandrae\Highrise\Client;

use BadMethodCallException;
use Guillermoandrae\Highrise\Http\Adapter;
use Guillermoandrae\Highrise\Http\AdapterAwareTrait;
use Guillermoandrae\Highrise\Http\AdapterInterface;
use Guillermoandrae\Highrise\Http\CredentialsAwareTrait;
use Guillermoandrae\Highrise\Resources;
use Guillermoandrae\Highrise\Resources\ResourceFactory;
use Guillermoandrae\Highrise\Resources\ResourceInterface;

/**
 * Highrise Client class.
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
    use AdapterAwareTrait, CredentialsAwareTrait;

    /**
     * The HTTP adapter.
     *
     * @var AdapterInterface
     */
    private $defaultAdapter;

    /**
     * Client constructor.
     *
     * @param string $subdomain The account subdomain.
     * @param string $token The authentication token.
     */
    public function __construct(string $subdomain = '', string $token = '')
    {
        $this->setSubdomain($subdomain);
        $this->setToken($token);
    }

    /**
     * Invoked when non-existent methods are called. Can be used for returning
     * resources.
     *
     * @param string $name The method name.
     * @param array $arguments The method arguments.
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        try {
            return $this->resource($name);
        } catch (\Exception $ex) {
            throw new BadMethodCallException(
                sprintf('The %s method does not exist.', $name)
            );
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
        if (!$client = $this->adapter) {
            $this->setAdapter($this->getDefaultAdapter());
        }
        return ResourceFactory::factory($name, $this->getAdapter());
    }

    /**
     * @return AdapterInterface
     */
    public function getDefaultAdapter(): AdapterInterface
    {
        if (!$this->defaultAdapter) {
            $this->defaultAdapter = new Adapter($this->getSubdomain(), $this->getToken());
        }
        return $this->defaultAdapter;
    }
}
