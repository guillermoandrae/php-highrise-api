<?php

namespace Guillermoandrae\Highrise\Resources;

class Users extends AbstractResource
{
    use UnsearchableResourceTrait, ReadOnlyResourceTrait;

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
