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
     * Registers the HTTP adapter with the class.
     *
     * @param AdapterInterface $adapter  The HTTP adapter.
     */
    final public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Returns the HTTP adapter.
     *
     * @return AdapterInterface
     */
    final public function getAdapter(): AdapterInterface
    {
        return $this->adapter;
    }
}
