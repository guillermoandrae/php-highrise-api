<?php

namespace Guillermoandrae\Highrise\Models;

use DateTime;

final class DealModel extends AbstractModel
{
    /**
     * The account ID.
     *
     * @var integer
     */
    protected $accountId;

    /**
     * The author ID.
     *
     * @var integer
     */
    protected $authorId;

    /**
     * The category ID.
     *
     * @var integer
     */
    protected $categoryId;

    /**
     * The party ID.
     *
     * @var integer
     */
    protected $partyId;

    /**
     * The responsible party ID.
     *
     * @var integer
     */
    protected $responsiblePartyId;

    /**
     * The background.
     *
     * @var string
     */
    protected $background;

    /**
     * The currency.
     *
     * @var string
     */
    protected $currency;

    /**
     * The duration.
     *
     * @var integer
     */
    protected $duration;

    /**
     * The price.
     *
     * @var integer
     */
    protected $price;

    /**
     * The price type.
     *
     * @var string
     */
    protected $priceType;

    /**
     * The status.
     *
     * @var string
     */
    protected $status;

    /**
     * The date on which the deal status was changed.
     *
     * @var DateTime
     */
    protected $statusChangedOn;

    /**
     * The visibility.
     *
     * @var string
     */
    protected $visibleTo;

    /**
     * Returns the accountId.
     *
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->accountId;
    }

    /**
     * Returns the authorId.
     *
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * Returns the categoryId.
     *
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * Returns the partyId.
     *
     * @return int
     */
    public function getPartyId(): int
    {
        return $this->partyId;
    }

    /**
     * Returns the responsiblePartyId.
     *
     * @return int
     */
    public function getResponsiblePartyId(): int
    {
        return $this->responsiblePartyId;
    }

    /**
     * Returns the background.
     *
     * @return string
     */
    public function getBackground(): string
    {
        return $this->background;
    }

    /**
     * Returns the currency.
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Returns the duration.
     *
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Returns the price.
     *
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Returns the priceType.
     *
     * @return string
     */
    public function getPriceType(): string
    {
        return $this->priceType;
    }

    /**
     * Returns the status.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Returns the statusChangedOn.
     *
     * @return DateTime
     */
    public function getStatusChangedOn(): DateTime
    {
        return $this->statusChangedOn;
    }

    /**
     * Returns the visibleTo.
     *
     * @return string
     */
    public function getVisibleTo(): string
    {
        return $this->visibleTo;
    }
}
