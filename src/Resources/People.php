<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;

class People extends AbstractResource
{
    public function findByCompanyId($id): CollectionInterface
    {
        $uri = sprintf('/companies/%s/%s.xml', $id, $this->getName());
        return $this->getAdapter()->request('GET', $uri);
    }
}
