<?php

namespace Guillermoandrae\Highrise\Entities;

class EntityFactory
{
    public static function factory(string $name, string $xml)
    {
        try {
            $className = sprintf(
                '%s\%s',
                __NAMESPACE__,
                ucfirst(strtolower($name))
            );
            $reflectionClass = new \ReflectionClass($className);
            return $reflectionClass->newInstanceArgs([$xml]);
        } catch (\ReflectionException $ex) {
            throw new InvalidEntityException(
                sprintf('The %s entity does not exist.', $name)
            );
        }
    }
}
