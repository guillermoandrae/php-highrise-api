<?php

namespace Guillermoandrae\Highrise\Resources;

class Users extends AbstractResource
{
    /**
     * Returns the current user's information.
     *
     * @return array
     */
    public function me(): array
    {
        return $this->getAdapter()->request('GET', '/me.xml');
    }
}
