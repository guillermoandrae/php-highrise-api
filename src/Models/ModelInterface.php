<?php

namespace Guillermoandrae\Highrise\Models;

use Guillermoandrae\Models\ModelInterface as BaseModelInterface;

interface ModelInterface extends BaseModelInterface
{
    /**
     * Builds the entity.
     *
     * @param string $xml The entity XML.
     */
    public function __construct(string $xml);
}
