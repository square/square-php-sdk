<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class Channel extends JsonSerializableType
{
    /**
     * @var ?string $id The channel's unique ID.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $merchantId The unique ID of the merchant this channel belongs to.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * @var ?string $name The name of the channel.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?int $version The version number which is incremented each time an update is made to the channel.
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?Reference $reference Represents an entity the channel is associated with.
     */
    #[JsonProperty('reference')]
    private ?Reference $reference;

    /**
     * Status of the channel.
     * See [Status](#type-status) for possible values
     *
     * @var ?value-of<ChannelStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * The timestamp for when the channel was created, in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     * For more information, see [Working with Dates](https://developer.squareup.com/docs/build-basics/working-with-dates).
     *
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * The timestamp for when the channel was last updated, in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     * For more information, see [Working with Dates](https://developer.squareup.com/docs/build-basics/working-with-dates).
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   merchantId?: ?string,
     *   name?: ?string,
     *   version?: ?int,
     *   reference?: ?Reference,
     *   status?: ?value-of<ChannelStatus>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->merchantId = $values['merchantId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->reference = $values['reference'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @param ?string $value
     */
    public function setMerchantId(?string $value = null): self
    {
        $this->merchantId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?Reference
     */
    public function getReference(): ?Reference
    {
        return $this->reference;
    }

    /**
     * @param ?Reference $value
     */
    public function setReference(?Reference $value = null): self
    {
        $this->reference = $value;
        return $this;
    }

    /**
     * @return ?value-of<ChannelStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<ChannelStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
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
