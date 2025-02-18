<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Additional details about Clearpay payments.
 */
class ClearpayDetails extends JsonSerializableType
{
    /**
     * @var ?string $emailAddress Email address on the buyer's Clearpay account.
     */
    #[JsonProperty('email_address')]
    private ?string $emailAddress;

    /**
     * @param array{
     *   emailAddress?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailAddress = $values['emailAddress'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * @param ?string $value
     */
    public function setEmailAddress(?string $value = null): self
    {
        $this->emailAddress = $value;
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
