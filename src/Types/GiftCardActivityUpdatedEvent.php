<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Published when a [gift card activity](entity:GiftCardActivity) is updated.
 * Subscribe to this event to be notified about the following changes:
 * - An update to the `REDEEM` activity for a gift card redemption made from a Square product (such as Square Point of Sale).
 * These redemptions are initially assigned a `PENDING` state, but then change to a `COMPLETED` or `CANCELED` state.
 * - An update to the `IMPORT` activity for an imported gift card when the balance is later adjusted by Square.
 */
class GiftCardActivityUpdatedEvent extends JsonSerializableType
{
    /**
     * @var ?string $merchantId The ID of the Square seller associated with the event.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * @var ?string $type The type of event. For this event, the value is `gift_card.activity.updated`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * The unique ID of the event, which is used for
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
     * @var ?GiftCardActivityUpdatedEventData $data The data associated with the event.
     */
    #[JsonProperty('data')]
    private ?GiftCardActivityUpdatedEventData $data;

    /**
     * @param array{
     *   merchantId?: ?string,
     *   type?: ?string,
     *   eventId?: ?string,
     *   createdAt?: ?string,
     *   data?: ?GiftCardActivityUpdatedEventData,
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
     * @return ?GiftCardActivityUpdatedEventData
     */
    public function getData(): ?GiftCardActivityUpdatedEventData
    {
        return $this->data;
    }

    /**
     * @param ?GiftCardActivityUpdatedEventData $value
     */
    public function setData(?GiftCardActivityUpdatedEventData $value = null): self
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
