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
     * Indicates whether the customer has unsubscribed from marketing campaign emails. A value of `true`
     * means that the customer chose to opt out of email marketing from the current Square seller or from
     * all Square sellers. This value is read-only from the Customers API.
     */
    public function getEmailUnsubscribed(): ?bool
    {
        return $this->emailUnsubscribed;
    }

    /**
     * Sets Email Unsubscribed.
     *
     * Indicates whether the customer has unsubscribed from marketing campaign emails. A value of `true`
     * means that the customer chose to opt out of email marketing from the current Square seller or from
     * all Square sellers. This value is read-only from the Customers API.
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
        if (isset($this->emailUnsubscribed)) {
            $json['email_unsubscribed'] = $this->emailUnsubscribed;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
