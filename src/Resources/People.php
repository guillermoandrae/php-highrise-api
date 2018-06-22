<?php

namespace Guillermoandrae\Highrise\Resources;

class People extends AbstractResource
{
    public function findByCompanyId($id)
    {
        $uri = sprintf('/companies/%s/%s.xml', $id, $this->getName());
        return $this->getAdapter()->request('GET', $uri);
    }
}
