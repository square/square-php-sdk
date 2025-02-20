<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the mapping that associates a loyalty account with a buyer.
 *
 * Currently, a loyalty account can only be mapped to a buyer by phone number. For more information, see
 * [Loyalty Overview](https://developer.squareup.com/docs/loyalty/overview).
 */
class LoyaltyAccountMapping extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the mapping.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $createdAt The timestamp when the mapping was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $phoneNumber The phone number of the buyer, in E.164 format. For example, "+14155551111".
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * @param array{
     *   id?: ?string,
     *   createdAt?: ?string,
     *   phoneNumber?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param ?string $value
     */
    public function setPhoneNumber(?string $value = null): self
    {
        $this->phoneNumber = $value;
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
