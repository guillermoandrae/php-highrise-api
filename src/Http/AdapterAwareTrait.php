<?php

namespace Guillermoandrae\Highrise\Http;

trait AdapterAwareTrait
{
    /**
     * The HTTP adapter.
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Registers the HTTP adapter with this class.
     *
     * @param AdapterInterface $adapter  The HTTP adapter.
     */
    final public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Returns the HTTP adapter registered with this class.
     *
     * @return AdapterInterface
     */
    final public function getAdapter(): AdapterInterface
    {
        return $this->adapter;
    }
}
