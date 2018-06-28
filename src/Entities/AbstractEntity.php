<?php

namespace Guillermoandrae\Highrise\Entities;

use DateTime;
use SimpleXMLElement;

abstract class AbstractEntity implements EntityInterface
{
    /**
     * @var SimpleXMLElement
     */
    protected $xml;

    /**
     * The entity ID.
     *
     * @var int
     */
    protected $id;

    /**
     * The entity name.
     *
     * @var string
     */
    protected $name;

    /**
     * The date on which the entity was created.
     *
     * @var DateTime
     */
    protected $createdAt;

    /**
     * The date on which the entity was updated.
     *
     * @var DateTime
     */
    protected $updatedAt;

    public function __construct(string $xml)
    {
        $this->xml = simplexml_load_string($xml);
        $this->id = (int) $this->xml->xpath('//id');
        $this->name = (string) $this->xml->xpath('//name')[0];
        $this->createdAt = new DateTime((string) $this->xml->xpath('//created-at')[0]);
        $this->updatedAt = new DateTime((string) $this->xml->xpath('//updated-at')[0]);
    }

    /**
     * Returns the SimpleXMLElement.
     *
     * @return SimpleXMLElement
     */
    final public function getXml(): SimpleXMLElement
    {
        return $this->xml;
    }

    /**
     * Returns the entity ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the entity name;
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the date on which the entity was created.
     *
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Returns the date on which the entity was updated.
     *
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}
