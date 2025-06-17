<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Published when a [loyalty account](entity:LoyaltyAccount) is created.
 */
class LoyaltyAccountCreatedEvent extends JsonSerializableType
{
    /**
     * @var ?string $merchantId The ID of the Square seller associated with the event.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * @var ?string $type The type of event. For this event, the value is `loyalty.account.created`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * The unique ID for the event, which is used for
     * [idempotency support](https://developer.squareup.com/docs/webhooks/step4manage#webhooks-best-practices).
     *
     * @var ?string $eventId
     */
    #[JsonProperty('event_id')]
    private ?string $eventId;

    /**
     * @var ?string $createdAt The timestamp of when the event was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?LoyaltyAccountCreatedEventData $data The data associated with the event.
     */
    #[JsonProperty('data')]
    private ?LoyaltyAccountCreatedEventData $data;

    /**
     * @param array{
     *   merchantId?: ?string,
     *   type?: ?string,
     *   eventId?: ?string,
     *   createdAt?: ?string,
     *   data?: ?LoyaltyAccountCreatedEventData,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->merchantId = $values['merchantId'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->eventId = $values['eventId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->data = $values['data'] ?? null;
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
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    /**
     * @param ?string $value
     */
    public function setEventId(?string $value = null): self
    {
        $this->eventId = $value;
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
     * @return ?LoyaltyAccountCreatedEventData
     */
    public function getData(): ?LoyaltyAccountCreatedEventData
    {
        return $this->data;
    }

    /**
     * @param ?LoyaltyAccountCreatedEventData $value
     */
    public function setData(?LoyaltyAccountCreatedEventData $value = null): self
    {
        $this->data = $value;
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
