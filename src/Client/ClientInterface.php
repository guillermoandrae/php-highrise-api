<?php

namespace Guillermoandrae\Highrise\Client;

use Guillermoandrae\Highrise\Http\AdapterInterface;
use Guillermoandrae\Highrise\Repositories\RepositoryInterface;

interface ClientInterface
{
    /**
     * Returns the desired resource.
     *
     * @param string $name  The name of the desired resource.
     * @return RepositoryInterface
     */
    public function resource(string $name): RepositoryInterface;

    /**
     * When no default adapter is explicitly registered, this method will
     * lazy load and return one.
     *
     * @return AdapterInterface
     */
    public function getDefaultAdapter(): AdapterInterface;
}
