<?php

namespace Guillermoandrae\Highrise\Models;

trait PartyAwareTrait
{
    /**
     * The parties.
     *
     * @var array
     */
    protected $parties;

    final public function getParties(): array
    {
        return $this->parties;
    }
}