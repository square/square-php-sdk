<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Data model for updating a transfer order. All fields are optional.
 */
class UpdateTransferOrderData extends JsonSerializableType
{
    /**
     * The source [Location](entity:Location) that will send the items. Must be an active location
     * in your Square account with sufficient inventory of the requested items.
     *
     * @var ?string $sourceLocationId
     */
    #[JsonProperty('source_location_id')]
    private ?string $sourceLocationId;

    /**
     * The destination [Location](entity:Location) that will receive the items. Must be an active location
     * in your Square account.
     *
     * @var ?string $destinationLocationId
     */
    #[JsonProperty('destination_location_id')]
    private ?string $destinationLocationId;

    /**
     * @var ?string $expectedAt Expected transfer date in RFC 3339 format (e.g. "2023-10-01T12:00:00Z").
     */
    #[JsonProperty('expected_at')]
    private ?string $expectedAt;

    /**
     * @var ?string $notes Optional notes about the transfer
     */
    #[JsonProperty('notes')]
    private ?string $notes;

    /**
     * @var ?string $trackingNumber Shipment tracking number
     */
    #[JsonProperty('tracking_number')]
    private ?string $trackingNumber;

    /**
     * @var ?array<UpdateTransferOrderLineData> $lineItems List of items being transferred
     */
    #[JsonProperty('line_items'), ArrayType([UpdateTransferOrderLineData::class])]
    private ?array $lineItems;

    /**
     * @param array{
     *   sourceLocationId?: ?string,
     *   destinationLocationId?: ?string,
     *   expectedAt?: ?string,
     *   notes?: ?string,
     *   trackingNumber?: ?string,
     *   lineItems?: ?array<UpdateTransferOrderLineData>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sourceLocationId = $values['sourceLocationId'] ?? null;
        $this->destinationLocationId = $values['destinationLocationId'] ?? null;
        $this->expectedAt = $values['expectedAt'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->trackingNumber = $values['trackingNumber'] ?? null;
        $this->lineItems = $values['lineItems'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getSourceLocationId(): ?string
    {
        return $this->sourceLocationId;
    }

    /**
     * @param ?string $value
     */
    public function setSourceLocationId(?string $value = null): self
    {
        $this->sourceLocationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDestinationLocationId(): ?string
    {
        return $this->destinationLocationId;
    }

    /**
     * @param ?string $value
     */
    public function setDestinationLocationId(?string $value = null): self
    {
        $this->destinationLocationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExpectedAt(): ?string
    {
        return $this->expectedAt;
    }

    /**
     * @param ?string $value
     */
    public function setExpectedAt(?string $value = null): self
    {
        $this->expectedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param ?string $value
     */
    public function setNotes(?string $value = null): self
    {
        $this->notes = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * @param ?string $value
     */
    public function setTrackingNumber(?string $value = null): self
    {
        $this->trackingNumber = $value;
        return $this;
    }

    /**
     * @return ?array<UpdateTransferOrderLineData>
     */
    public function getLineItems(): ?array
    {
        return $this->lineItems;
    }

    /**
     * @param ?array<UpdateTransferOrderLineData> $value
     */
    public function setLineItems(?array $value = null): self
    {
        $this->lineItems = $value;
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
