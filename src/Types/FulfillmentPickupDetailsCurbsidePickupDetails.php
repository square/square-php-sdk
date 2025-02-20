<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Specific details for curbside pickup.
 */
class FulfillmentPickupDetailsCurbsidePickupDetails extends JsonSerializableType
{
    /**
     * @var ?string $curbsideDetails Specific details for curbside pickup, such as parking number and vehicle model.
     */
    #[JsonProperty('curbside_details')]
    private ?string $curbsideDetails;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the buyer arrived and is waiting for pickup. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $buyerArrivedAt
     */
    #[JsonProperty('buyer_arrived_at')]
    private ?string $buyerArrivedAt;

    /**
     * @param array{
     *   curbsideDetails?: ?string,
     *   buyerArrivedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->curbsideDetails = $values['curbsideDetails'] ?? null;
        $this->buyerArrivedAt = $values['buyerArrivedAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCurbsideDetails(): ?string
    {
        return $this->curbsideDetails;
    }

    /**
     * @param ?string $value
     */
    public function setCurbsideDetails(?string $value = null): self
    {
        $this->curbsideDetails = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBuyerArrivedAt(): ?string
    {
        return $this->buyerArrivedAt;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerArrivedAt(?string $value = null): self
    {
        $this->buyerArrivedAt = $value;
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
