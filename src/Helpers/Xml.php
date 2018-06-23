<?php

namespace Guillermoandrae\Highrise\Helpers;

use Guillermoandrae\Common\Collection;
use Guillermoandrae\Common\CollectionInterface;
use SimpleXMLElement;

final class Xml
{
    /**
     * Converts an XML string into either an associative array or an array of
     * associative arrays.
     *
     * @param string $xml The XML string.
     * @return array|CollectionInterface
     */
    public static function parse(string $xml)
    {
        if (!$obj = simplexml_load_string($xml)) {
            return [];
        }
        if ($obj->attributes()) {
            $items = [];
            foreach ($obj->children() as $child) {
                $items[] = static::flatten($child);
            }
            return Collection::make($items);
        }
        return (array) static::flatten($obj);
    }

    /**
     * Removes attributes from SimpleXMLElement objects.
     *
     * @param SimpleXMLElement $item The SimpleXMLElement object.
     * @return array
     */
    public static function flatten(SimpleXMLElement $item)
    {
        $parsedItem = [];
        foreach ($item as $key => $value) {
            $parsedItem[$key] = (string) $value;
        }
        return $parsedItem;
    }
}
