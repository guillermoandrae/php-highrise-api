<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Highrise\Http\AdapterInterface;

final class ResourceFactory
{
    /**
     * Returns the desired resource.
     *
     * @param string $name The name of the desired resource.
     * @param AdapterInterface $adapter The HTTP adapter.
     * @return ResourceInterface
     * @throws InvalidResourceException Thrown when an invalid resource is
     *         requested.
     */
    public static function factory(string $name, AdapterInterface $adapter): ResourceInterface
    {
        try {
            $className = sprintf(
                '%s\%s',
                __NAMESPACE__,
                ucfirst(strtolower($name))
            );
            $reflectionClass = new \ReflectionClass($className);
            return $reflectionClass->newInstanceArgs([$adapter]);
        } catch (\ReflectionException $ex) {
            throw new InvalidResourceException(
                sprintf('The %s resource does not exist.', $name)
            );
        }
    }
}
