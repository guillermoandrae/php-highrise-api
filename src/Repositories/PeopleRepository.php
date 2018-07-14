<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Common\CollectionInterface;

class PeopleRepository extends AbstractRepository
{
    public function findByCompanyId($id): CollectionInterface
    {
        $uri = sprintf('/companies/%s/%s.xml', $id, $this->getName());
        $results = $this->getAdapter()->request('GET', $uri);
        return $this->hydrate($results);
    }
}
