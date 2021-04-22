<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents the mapping that associates a loyalty account with a buyer.
 *
 * Currently, a loyalty account can only be mapped to a buyer by phone number. For more information,
 * see
 * [Loyalty Overview](https://developer.squareup.com/docs/loyalty/overview).
 */
class LoyaltyAccountMapping implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $value;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the mapping.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the mapping.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Type.
     *
     * The type of mapping.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * The type of mapping.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Value.
     *
     * The mapping value, which is used with `type` to represent a phone number mapping. The value can be a
     * phone number in E.164 format. For example, "+14155551111".
     *
     * When specifying a mapping, the `phone_number` field is preferred to using `type` and `value`.
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Sets Value.
     *
     * The mapping value, which is used with `type` to represent a phone number mapping. The value can be a
     * phone number in E.164 format. For example, "+14155551111".
     *
     * When specifying a mapping, the `phone_number` field is preferred to using `type` and `value`.
     *
     * @maps value
     */
    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the mapping was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the mapping was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Phone Number.
     *
     * The phone number of the buyer, in E.164 format. For example, "+14155551111".
     *
     * When specifying a mapping, this `phone_number` field is preferred to using `type` and `value`.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The phone number of the buyer, in E.164 format. For example, "+14155551111".
     *
     * When specifying a mapping, this `phone_number` field is preferred to using `type` and `value`.
     *
     * @maps phone_number
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']          = $this->id;
        $json['type']        = $this->type;
        $json['value']       = $this->value;
        $json['created_at']  = $this->createdAt;
        $json['phone_number'] = $this->phoneNumber;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
