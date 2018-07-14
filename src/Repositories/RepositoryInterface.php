<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Repositories\RepositoryInterface as BaseRepositoryInterface;
use Guillermoandrae\Highrise\Http\AdapterInterface;

interface RepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Returns the name to be used in the resource endpoint.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns the name of the associated model.
     *
     * @return string
     */
    public function getModelName(): string;

    /**
     * Returns the HTTP adapter registered with this object.
     *
     * @return AdapterInterface
     */
    public function getAdapter(): AdapterInterface;
}
