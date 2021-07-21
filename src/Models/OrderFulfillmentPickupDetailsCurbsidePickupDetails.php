<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Specific details for curbside pickup.
 */
class OrderFulfillmentPickupDetailsCurbsidePickupDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $curbsideDetails;

    /**
     * @var string|null
     */
    private $buyerArrivedAt;

    /**
     * Returns Curbside Details.
     *
     * Specific details for curbside pickup, such as parking number and vehicle model.
     */
    public function getCurbsideDetails(): ?string
    {
        return $this->curbsideDetails;
    }

    /**
     * Sets Curbside Details.
     *
     * Specific details for curbside pickup, such as parking number and vehicle model.
     *
     * @maps curbside_details
     */
    public function setCurbsideDetails(?string $curbsideDetails): void
    {
        $this->curbsideDetails = $curbsideDetails;
    }

    /**
     * Returns Buyer Arrived At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the buyer arrived and is waiting for pickup. The timestamp must be in RFC 3339
     * format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getBuyerArrivedAt(): ?string
    {
        return $this->buyerArrivedAt;
    }

    /**
     * Sets Buyer Arrived At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the buyer arrived and is waiting for pickup. The timestamp must be in RFC 3339
     * format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps buyer_arrived_at
     */
    public function setBuyerArrivedAt(?string $buyerArrivedAt): void
    {
        $this->buyerArrivedAt = $buyerArrivedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->curbsideDetails)) {
            $json['curbside_details'] = $this->curbsideDetails;
        }
        if (isset($this->buyerArrivedAt)) {
            $json['buyer_arrived_at'] = $this->buyerArrivedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
