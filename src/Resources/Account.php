<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Highrise\Http\ClientInterface;

class Account extends AbstractResource
{
    public function __construct(ClientInterface $httpClient)
    {
        parent::__construct($httpClient);
        $this->name = 'account';
    }
}
