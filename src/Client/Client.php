<?php

namespace Guillermoandrae\Highrise\Client;

use BadMethodCallException;
use Guillermoandrae\Highrise\Http\AdapterAwareTrait;
use Guillermoandrae\Highrise\Http\AdapterInterface;
use Guillermoandrae\Highrise\Http\CredentialsAwareTrait;
use Guillermoandrae\Highrise\Http\GuzzleAdapter;
use Guillermoandrae\Highrise\Repositories;
use Guillermoandrae\Highrise\Repositories\RepositoryInterface;
use Guillermoandrae\Repositories\RepositoryFactory;

/**
 * Highrise API Client class.
 *
 * @method Repositories\AccountRepository account()
 * @method Repositories\CasesRepository cases()
 * @method Repositories\CasesRepository kases()
 * @method Repositories\DealsRepository deals()
 * @method Repositories\EmailsRepository emails()
 * @method Repositories\PeopleRepository people()
 * @method Repositories\TasksRepository tasks()
 * @method Repositories\UsersRepository users()
 *
 * @see https://github.com/basecamp/highrise-api
 * @author Guillermo A. Fisher <me@guillermoandraefisher.com>
 */
final class Client implements ClientInterface
{
    use AdapterAwareTrait, CredentialsAwareTrait;

    /**
     * The default HTTP adapter.
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
     * API resources.
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

    public function resource(string $name): RepositoryInterface
    {
        if (!$client = $this->adapter) {
            $this->setAdapter($this->getDefaultAdapter());
        }
        $name = ($name == 'kases') ? 'cases' : $name;
        return RepositoryFactory::factory($name, $this->getAdapter());
    }

    public function getDefaultAdapter(): AdapterInterface
    {
        if (!$this->defaultAdapter) {
            $this->defaultAdapter = new GuzzleAdapter($this->getSubdomain(), $this->getToken());
        }
        return $this->defaultAdapter;
    }
}
