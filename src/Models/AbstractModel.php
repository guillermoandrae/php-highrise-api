<?php

namespace Guillermoandrae\Highrise\Models;

use DateTime;
use SimpleXMLElement;
use Guillermoandrae\Models\AbstractModel as BaseAbstractModel;

abstract class AbstractModel extends BaseAbstractModel implements ModelInterface
{
    /**
     * @var SimpleXMLElement
     */
    protected $xml;

    /**
     * The model ID.
     *
     * @var int
     */
    protected $id;

    /**
     * The model name.
     *
     * @var string
     */
    protected $name;

    /**
     * The date on which the model was created.
     *
     * @var DateTime
     */
    protected $createdAt;

    /**
     * The date on which the model was updated.
     *
     * @var DateTime
     */
    protected $updatedAt;

    public function __construct(string $xml)
    {
        $this->xml = simplexml_load_string($xml);
        $this->id = (int) (string) $this->xml->id;
        $this->name = (string) $this->xml->xpath('//name')[0];
        $this->createdAt = new DateTime((string) $this->xml->xpath('//created-at')[0]);
        $this->updatedAt = new DateTime((string) $this->xml->xpath('//updated-at')[0]);
    }

    final public function getXml(): SimpleXMLElement
    {
        return $this->xml;
    }

    final public function getId(): int
    {
        return $this->id;
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    final public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [];
    }
}
