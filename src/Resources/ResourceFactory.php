<?php

namespace Guillermoandrae\Highrise\Resources;

use Guillermoandrae\Highrise\Http\ClientInterface;

final class ResourceFactory
{
    public static function factory(string $name, ClientInterface $client): ResourceInterface
    {
        try {
            $className = sprintf(
                '%s\%s',
                __NAMESPACE__,
                ucfirst(strtolower($name))
            );
            $reflectionClass = new \ReflectionClass($className);
            return $reflectionClass->newInstanceArgs([$client]);
        } catch (\ReflectionException $ex) {
            dd($ex->getMessage());
            throw new InvalidResourceException(
                sprintf('The %s resource does not exist.', $name)
            );
        }
    }
}
