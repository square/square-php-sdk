<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Associates a loyalty account with the buyer's phone number.
 * For more information, see
 * [Loyalty Overview](https://developer.squareup.com/docs/loyalty/overview).
 */
class LoyaltyAccountMapping implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @param string $type
     * @param string $value
     */
    public function __construct(string $type, string $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * The type of mapping.
     *
     * @required
     * @maps type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Value.
     *
     * The phone number, in E.164 format. For example, "+14155551111".
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Sets Value.
     *
     * The phone number, in E.164 format. For example, "+14155551111".
     *
     * @required
     * @maps value
     */
    public function setValue(string $value): void
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']        = $this->id;
        $json['type']      = $this->type;
        $json['value']     = $this->value;
        $json['created_at'] = $this->createdAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
