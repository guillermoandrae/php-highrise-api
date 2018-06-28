<?php

namespace Guillermoandrae\Highrise\Entities;

class User extends AbstractEntity
{
    public function __construct(string $xml)
    {
        parent::__construct($xml);
    }
}
