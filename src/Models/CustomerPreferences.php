<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents communication preferences for the customer profile.
 */
class CustomerPreferences implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $emailUnsubscribed;

    /**
     * Returns Email Unsubscribed.
     *
     * The customer has unsubscribed from receiving marketing campaign emails.
     */
    public function getEmailUnsubscribed(): ?bool
    {
        return $this->emailUnsubscribed;
    }

    /**
     * Sets Email Unsubscribed.
     *
     * The customer has unsubscribed from receiving marketing campaign emails.
     *
     * @maps email_unsubscribed
     */
    public function setEmailUnsubscribed(?bool $emailUnsubscribed): void
    {
        $this->emailUnsubscribed = $emailUnsubscribed;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['email_unsubscribed'] = $this->emailUnsubscribed;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
