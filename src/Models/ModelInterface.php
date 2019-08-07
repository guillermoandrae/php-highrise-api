<?php

namespace Guillermoandrae\Highrise\Models;

use SimpleXMLElement;
use DateTime;
use Guillermoandrae\Models\ModelInterface as BaseModelInterface;

interface ModelInterface extends BaseModelInterface
{
    /**
     * Builds the entity.
     *
     * @param string $xml The entity XML.
     */
    public function __construct(string $xml);

    /**
     * Returns the SimpleXMLElement.
     *
     * @return SimpleXMLElement
     */
    public function getXml(): SimpleXMLElement;

    /**
     * Returns the ID.
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Returns the model name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns the date on which the model was created.
     *
     * @return DateTime
     */
    public function getCreatedAt(): DateTime;

    /**
     * Returns the date on which the model was updated.
     *
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime;
}
