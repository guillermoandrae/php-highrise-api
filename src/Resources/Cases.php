<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Common\CollectionInterface;

final class Cases extends AbstractUnsearchableResource
{
    protected $name = 'kases';

    public function findAll(array $options = []): CollectionInterface
    {
        $status = isset($options['status']) ? $options['status'] : 'open';
        $uri = sprintf('/%s/%s.xml', $this->getName(), $status);
        return $this->getAdapter()->request('GET', $uri, $options);
    }
}
