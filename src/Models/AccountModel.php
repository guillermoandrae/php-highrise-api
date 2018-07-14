<?php

namespace Guillermoandrae\Highrise\Models;

final class AccountModel extends AbstractModel
{
    /**
     * The ID.
     *
     * @var integer
     */
    protected $id;

    /**
     * The account subdomain.
     *
     * @var string
     */
    protected $subdomain;

    /**
     * The account plan.
     *
     * @var string
     */
    protected $plan;

    /**
     * The account owner's ID.
     *
     * @var int
     */
    protected $ownerId;

    /**
     * The number of people associated with the account.
     *
     * @var int
     */
    protected $peopleCount;

    /**
     * The account storage.
     *
     * @var int
     */
    protected $storage;

    /**
     * The account color theme.
     *
     * @var string
     */
    protected $colorTheme;

    /**
     * Whether or not SSL (TLS) is enabled.
     *
     * @var bool
     */
    protected $sslEnabled;

    public function __construct(string $xml)
    {
        parent::__construct($xml);
        $this->subdomain = (string) $this->getXml()->xpath('//subdomain')[0];
        $this->plan = (string) $this->getXml()->xpath('//plan')[0];
        $this->ownerId = (int) $this->getXml()->xpath('//owner-id')[0];
        $this->peopleCount = (int) $this->getXml()->xpath('//people-count')[0];
        $this->storage = (int) $this->getXml()->xpath('//storage')[0];
        $this->colorTheme = (string) $this->getXml()->xpath('//color_theme')[0];
    }

    /**
     * Returns the ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSubdomain(): string
    {
        return $this->subdomain;
    }

    /**
     * @return string
     */
    public function getPlan(): string
    {
        return $this->plan;
    }

    /**
     * @return string
     */
    public function getOwnerId(): string
    {
        return $this->ownerId;
    }

    /**
     * @return int
     */
    public function getPeopleCount(): int
    {
        return $this->peopleCount;
    }

    /**
     * @return int
     */
    public function getStorage(): int
    {
        return $this->storage;
    }

    /**
     * @return string
     */
    public function getColorTheme(): string
    {
        return $this->colorTheme;
    }

    /**
     * @return bool
     */
    public function isSslEnabled(): bool
    {
        return $this->sslEnabled;
    }
}
