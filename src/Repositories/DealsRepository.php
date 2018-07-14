<?php

namespace Guillermoandrae\Highrise\Repositories;

use Guillermoandrae\Highrise\Models\ModelInterface;

class DealsRepository extends AbstractRepository
{
    use UnsearchableRepositoryTrait;

    public function updateStatus($id, $status): ModelInterface
    {
        $uri = sprintf('/%s/%s/status.xml?reload=true', $this->getName(), $id);
        $body = sprintf('<status><name>%s</name></status>', $status);
        $results = $this->getAdapter()->request('PUT', $uri, ['body' => $body]);
        return $this->hydrate($results);
    }
}
