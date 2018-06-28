<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Highrise\Entities\EntityInterface;

class Deals extends AbstractResource
{
    use UnsearchableResourceTrait;

    public function updateStatus($id, $status): EntityInterface
    {
        $uri = sprintf('/%s/%s/status.xml?reload=true', $this->getName(), $id);
        $body = sprintf('<status><name>%s</name></status>', $status);
        return $this->getAdapter()->request('PUT', $uri, ['body' => $body]);
    }
}
