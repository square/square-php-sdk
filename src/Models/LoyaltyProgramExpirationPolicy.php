<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes when the loyalty program expires.
 */
class LoyaltyProgramExpirationPolicy implements \JsonSerializable
{
    /**
     * @var string
     */
    private $expirationDuration;

    /**
     * @param string $expirationDuration
     */
    public function __construct(string $expirationDuration)
    {
        $this->expirationDuration = $expirationDuration;
    }

    /**
     * Returns Expiration Duration.
     *
     * The duration of time before points expire, in RFC 3339 format.
     */
    public function getExpirationDuration(): string
    {
        return $this->expirationDuration;
    }

    /**
     * Sets Expiration Duration.
     *
     * The duration of time before points expire, in RFC 3339 format.
     *
     * @required
     * @maps expiration_duration
     */
    public function setExpirationDuration(string $expirationDuration): void
    {
        $this->expirationDuration = $expirationDuration;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['expiration_duration'] = $this->expirationDuration;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
