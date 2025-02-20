<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents communication preferences for the customer profile.
 */
class CustomerPreferences extends JsonSerializableType
{
    /**
     * @var ?bool $emailUnsubscribed Indicates whether the customer has unsubscribed from marketing campaign emails. A value of `true` means that the customer chose to opt out of email marketing from the current Square seller or from all Square sellers. This value is read-only from the Customers API.
     */
    #[JsonProperty('email_unsubscribed')]
    private ?bool $emailUnsubscribed;

    /**
     * @param array{
     *   emailUnsubscribed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailUnsubscribed = $values['emailUnsubscribed'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getEmailUnsubscribed(): ?bool
    {
        return $this->emailUnsubscribed;
    }

    /**
     * @param ?bool $value
     */
    public function setEmailUnsubscribed(?bool $value = null): self
    {
        $this->emailUnsubscribed = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
