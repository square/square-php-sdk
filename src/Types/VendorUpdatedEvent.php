<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Published when a [Vendor](entity:Vendor) is updated.
 */
class VendorUpdatedEvent extends JsonSerializableType
{
    /**
     * @var ?string $merchantId The ID of a seller associated with this event.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * @var ?string $locationId The ID of a seller location associated with this event, if the event is associated with the location.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $type The type of this event. The value is `"vendor.updated".`
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $eventId A unique ID for this webhoook event.
     */
    #[JsonProperty('event_id')]
    private ?string $eventId;

    /**
     * @var ?string $createdAt The RFC 3339-formatted time when the underlying event data object is created.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?VendorUpdatedEventData $data The data associated with this event.
     */
    #[JsonProperty('data')]
    private ?VendorUpdatedEventData $data;

    /**
     * @param array{
     *   merchantId?: ?string,
     *   locationId?: ?string,
     *   type?: ?string,
     *   eventId?: ?string,
     *   createdAt?: ?string,
     *   data?: ?VendorUpdatedEventData,
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
        $this->_setField('merchantId');
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
        $this->_setField('locationId');
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
        $this->_setField('type');
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
        $this->_setField('eventId');
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
        $this->_setField('createdAt');
        return $this;
    }

    /**
     * @return ?VendorUpdatedEventData
     */
    public function getData(): ?VendorUpdatedEventData
    {
        return $this->data;
    }

    /**
     * @param ?VendorUpdatedEventData $value
     */
    public function setData(?VendorUpdatedEventData $value = null): self
    {
        $this->data = $value;
        $this->_setField('data');
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
