<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents the details of a webhook subscription, including notification URL,
 * event types, and signature key.
 */
class WebhookSubscription extends JsonSerializableType
{
    /**
     * @var ?string $id A Square-generated unique ID for the subscription.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $name The name of this subscription.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?bool $enabled Indicates whether the subscription is enabled (`true`) or not (`false`).
     */
    #[JsonProperty('enabled')]
    private ?bool $enabled;

    /**
     * @var ?array<string> $eventTypes The event types associated with this subscription.
     */
    #[JsonProperty('event_types'), ArrayType(['string'])]
    private ?array $eventTypes;

    /**
     * @var ?string $notificationUrl The URL to which webhooks are sent.
     */
    #[JsonProperty('notification_url')]
    private ?string $notificationUrl;

    /**
     * The API version of the subscription.
     * This field is optional for `CreateWebhookSubscription`.
     * The value defaults to the API version used by the application.
     *
     * @var ?string $apiVersion
     */
    #[JsonProperty('api_version')]
    private ?string $apiVersion;

    /**
     * @var ?string $signatureKey The Square-generated signature key used to validate the origin of the webhook event.
     */
    #[JsonProperty('signature_key')]
    private ?string $signatureKey;

    /**
     * @var ?string $createdAt The timestamp of when the subscription was created, in RFC 3339 format. For example, "2016-09-04T23:59:33.123Z".
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * The timestamp of when the subscription was last updated, in RFC 3339 format.
     * For example, "2016-09-04T23:59:33.123Z".
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   enabled?: ?bool,
     *   eventTypes?: ?array<string>,
     *   notificationUrl?: ?string,
     *   apiVersion?: ?string,
     *   signatureKey?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->eventTypes = $values['eventTypes'] ?? null;
        $this->notificationUrl = $values['notificationUrl'] ?? null;
        $this->apiVersion = $values['apiVersion'] ?? null;
        $this->signatureKey = $values['signatureKey'] ?? null;
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
     * @return ?bool
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param ?bool $value
     */
    public function setEnabled(?bool $value = null): self
    {
        $this->enabled = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getEventTypes(): ?array
    {
        return $this->eventTypes;
    }

    /**
     * @param ?array<string> $value
     */
    public function setEventTypes(?array $value = null): self
    {
        $this->eventTypes = $value;
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
     * @return ?string
     */
    public function getApiVersion(): ?string
    {
        return $this->apiVersion;
    }

    /**
     * @param ?string $value
     */
    public function setApiVersion(?string $value = null): self
    {
        $this->apiVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSignatureKey(): ?string
    {
        return $this->signatureKey;
    }

    /**
     * @param ?string $value
     */
    public function setSignatureKey(?string $value = null): self
    {
        $this->signatureKey = $value;
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
