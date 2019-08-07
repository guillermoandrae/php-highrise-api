<?php

namespace Guillermoandrae\Highrise\Models;

trait GroupAndOwnerAwareTrait
{
    /**
     * The account owner's ID.
     *
     * @var int
     */
    protected $ownerId;

    /**
     * The group ID.
     *
     * @var integer
     */
    protected $groupId;

    /**
     * Returns the groupId.
     *
     * @return int
     */
    final public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * Returns the ownerId.
     *
     * @return int
     */
    final public function getOwnerId(): int
    {
        return $this->ownerId;
    }
}
