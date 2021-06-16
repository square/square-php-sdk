<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes a gift card activity of the DEACTIVATE type.
 */
class GiftCardActivityDeactivate implements \JsonSerializable
{
    /**
     * @var string
     */
    private $reason;

    /**
     * @param string $reason
     */
    public function __construct(string $reason)
    {
        $this->reason = $reason;
    }

    /**
     * Returns Reason.
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * @required
     * @maps reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['reason'] = $this->reason;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
