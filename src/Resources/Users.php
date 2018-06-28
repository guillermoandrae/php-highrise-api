<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Highrise\Entities\EntityInterface;

class Users extends AbstractResource
{
    use UnsearchableResourceTrait, ReadOnlyResourceTrait;

    /**
     * Returns the current user's information.
     *
     * @return EntityInterface
     */
    public function me(): EntityInterface
    {
        return $this->getAdapter()->request('GET', '/me.xml');
    }
}
