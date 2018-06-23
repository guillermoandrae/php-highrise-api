<?php

namespace Guillermoandrae\Highrise\Resources;

class Deals extends AbstractResource
{
    use UnsearchableResourceTrait;

    public function updateStatus($id, $status): array
    {
        $uri = sprintf('/%s/%s/status.xml?reload=true', $this->getName(), $id);
        $body = sprintf('<status><name>%s</name></status>', $status);
        return $this->getAdapter()->request('PUT', $uri, ['body' => $body]);
    }
}
