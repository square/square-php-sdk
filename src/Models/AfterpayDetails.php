<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Additional details about Afterpay payments.
 */
class AfterpayDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $emailAddress;

    /**
     * Returns Email Address.
     *
     * Email address on the buyer's Afterpay account.
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * Email address on the buyer's Afterpay account.
     *
     * @maps email_address
     */
    public function setEmailAddress(?string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->emailAddress)) {
            $json['email_address'] = $this->emailAddress;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
