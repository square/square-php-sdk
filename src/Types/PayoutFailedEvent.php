<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Published when a [Payout](entity:Payout) has failed.
 */
class PayoutFailedEvent extends JsonSerializableType
{
    /**
     * @var ?string $merchantId The ID of the target merchant associated with the event.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * @var ?string $locationId The ID of the target location associated with the event.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $type The type of event that this represents, `payout.failed`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $eventId A unique ID for the event.
     */
    #[JsonProperty('event_id')]
    private ?string $eventId;

    /**
     * @var ?string $createdAt The timestamp of when the event was verified, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?PayoutFailedEventData $data Data associated with the event.
     */
    #[JsonProperty('data')]
    private ?PayoutFailedEventData $data;

    /**
     * @param array{
     *   merchantId?: ?string,
     *   locationId?: ?string,
     *   type?: ?string,
     *   eventId?: ?string,
     *   createdAt?: ?string,
     *   data?: ?PayoutFailedEventData,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->merchantId = $values['merchantId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
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
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
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
     * @return ?PayoutFailedEventData
     */
    public function getData(): ?PayoutFailedEventData
    {
        return $this->data;
    }

    /**
     * @param ?PayoutFailedEventData $value
     */
    public function setData(?PayoutFailedEventData $value = null): self
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
