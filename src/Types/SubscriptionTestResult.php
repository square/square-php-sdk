<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents the result of testing a webhook subscription. Note: The actual API returns these fields at the root level of TestWebhookSubscriptionResponse, not nested under this object.
 */
class SubscriptionTestResult extends JsonSerializableType
{
    /**
     * @var ?string $id A Square-generated unique ID for the subscription test result.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?int $statusCode The HTTP status code returned by the notification URL.
     */
    #[JsonProperty('status_code')]
    private ?int $statusCode;

    /**
     * @var ?array<string, mixed> $payload The payload that was sent in the test notification.
     */
    #[JsonProperty('payload'), ArrayType(['string' => 'mixed'])]
    private ?array $payload;

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
     * @var ?string $notificationUrl The URL that was used for the webhook notification test.
     */
    #[JsonProperty('notification_url')]
    private ?string $notificationUrl;

    /**
     * @var ?bool $passesFilter Whether the notification passed any configured filters.
     */
    #[JsonProperty('passes_filter')]
    private ?bool $passesFilter;

    /**
     * @param array{
     *   id?: ?string,
     *   statusCode?: ?int,
     *   payload?: ?array<string, mixed>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   notificationUrl?: ?string,
     *   passesFilter?: ?bool,
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
        $this->notificationUrl = $values['notificationUrl'] ?? null;
        $this->passesFilter = $values['passesFilter'] ?? null;
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
     * @return ?array<string, mixed>
     */
    public function getPayload(): ?array
    {
        return $this->payload;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setPayload(?array $value = null): self
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
     * @return ?string
     */
    public function getNotificationUrl(): ?string
    {
        return $this->notificationUrl;
    }

    /**
     * @param ?string $value
     */
    public function setNotificationUrl(?string $value = null): self
    {
        $this->notificationUrl = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getPassesFilter(): ?bool
    {
        return $this->passesFilter;
    }

    /**
     * @param ?bool $value
     */
    public function setPassesFilter(?bool $value = null): self
    {
        $this->passesFilter = $value;
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
