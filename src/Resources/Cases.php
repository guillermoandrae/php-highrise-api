<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Highrise\Http\ClientInterface;

class Cases extends AbstractResource
{
    public function __construct(ClientInterface $httpClient)
    {
        parent::__construct($httpClient);
        $this->name = 'kases';
    }
}
