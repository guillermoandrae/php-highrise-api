<?php

namespace Guillermoandrae\Highrise\Client;

use Guillermoandrae\Highrise\Http\AdapterInterface;
use Guillermoandrae\Highrise\Resources\ResourceInterface;

interface ClientInterface
{
    /**
     * Returns the desired resource.
     *
     * @param string $name  The name of the desired resource.
     * @return ResourceInterface
     */
    public function resource(string $name): ResourceInterface;

    /**
     * When no default adapter is explicitly registered, this method will
     * lazy load and return one.
     *
     * @return AdapterInterface
     */
    public function getDefaultAdapter(): AdapterInterface;
}
