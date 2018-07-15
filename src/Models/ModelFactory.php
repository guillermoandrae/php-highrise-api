<?php

namespace Guillermoandrae\Highrise\Models;

use Guillermoandrae\Models\InvalidModelException;

final class ModelFactory
{
    /**
     * Returns the desired model using the provided data.
     *
     * @param string $name The name of the desired model.
     * @param string $xml The XML.
     * @return ModelInterface
     * @throws InvalidModelException  Thrown when an invalid model is
     *                                requested.
     */
    public static function factory(string $name, string $xml): ModelInterface
    {
        try {
            $name = $name == 'kases' ? 'case' : $name;
            $className = sprintf(
                '%s\%sModel',
                __NAMESPACE__,
                ucfirst(strtolower($name))
            );
            $reflectionClass = new \ReflectionClass($className);
            return $reflectionClass->newInstance($xml);
        } catch (\ReflectionException $ex) {
            throw new InvalidModelException(
                sprintf('The %s model does not exist.', $name)
            );
        }
    }
}
