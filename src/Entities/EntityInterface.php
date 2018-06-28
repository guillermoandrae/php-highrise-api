<?php

namespace Guillermoandrae\Highrise\Entities;

interface EntityInterface
{
    /**
     * Builds the entity.
     *
     * @param string $xml The entity XML.
     */
    public function __construct(string $xml);
}
