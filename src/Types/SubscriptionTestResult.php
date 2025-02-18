<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the details of a webhook subscription, including notification URL,
 * event types, and signature key.
 */
class SubscriptionTestResult extends JsonSerializableType
{
    /**
     * @var ?string $id A Square-generated unique ID for the subscription test result.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?int $statusCode The status code returned by the subscription notification URL.
     */
    #[JsonProperty('status_code')]
    private ?int $statusCode;

    /**
     * @var ?string $payload An object containing the payload of the test event. For example, a `payment.created` event.
     */
    #[JsonProperty('payload')]
    private ?string $payload;

    /**
     * The timestamp of when the subscription was created, in RFC 3339 format.
     * For example, "2016-09-04T23:59:33.123Z".
     *
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * The timestamp of when the subscription was updated, in RFC 3339 format. For example, "2016-09-04T23:59:33.123Z".
     * Because a subscription test result is unique, this field is the same as the `created_at` field.
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   statusCode?: ?int,
     *   payload?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->statusCode = $values['statusCode'] ?? null;
        $this->payload = $values['payload'] ?? null;
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
     * @return ?int
     */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /**
     * @param ?int $value
     */
    public function setStatusCode(?int $value = null): self
    {
        $this->statusCode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPayload(): ?string
    {
        return $this->payload;
    }

    /**
     * @param ?string $value
     */
    public function setPayload(?string $value = null): self
    {
        $this->payload = $value;
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
