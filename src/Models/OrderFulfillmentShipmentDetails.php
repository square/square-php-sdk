<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Contains the details necessary to fulfill a shipment order.
 */
class OrderFulfillmentShipmentDetails implements \JsonSerializable
{
    /**
     * @var OrderFulfillmentRecipient|null
     */
    private $recipient;

    /**
     * @var string|null
     */
    private $carrier;

    /**
     * @var string|null
     */
    private $shippingNote;

    /**
     * @var string|null
     */
    private $shippingType;

    /**
     * @var string|null
     */
    private $trackingNumber;

    /**
     * @var string|null
     */
    private $trackingUrl;

    /**
     * @var string|null
     */
    private $placedAt;

    /**
     * @var string|null
     */
    private $inProgressAt;

    /**
     * @var string|null
     */
    private $packagedAt;

    /**
     * @var string|null
     */
    private $expectedShippedAt;

    /**
     * @var string|null
     */
    private $shippedAt;

    /**
     * @var string|null
     */
    private $canceledAt;

    /**
     * @var string|null
     */
    private $cancelReason;

    /**
     * @var string|null
     */
    private $failedAt;

    /**
     * @var string|null
     */
    private $failureReason;

    /**
     * Returns Recipient.
     *
     * Contains information about the recipient of a fulfillment.
     */
    public function getRecipient(): ?OrderFulfillmentRecipient
    {
        return $this->recipient;
    }

    /**
     * Sets Recipient.
     *
     * Contains information about the recipient of a fulfillment.
     *
     * @maps recipient
     */
    public function setRecipient(?OrderFulfillmentRecipient $recipient): void
    {
        $this->recipient = $recipient;
    }

    /**
     * Returns Carrier.
     *
     * The shipping carrier being used to ship this fulfillment (such as UPS, FedEx, or USPS).
     */
    public function getCarrier(): ?string
    {
        return $this->carrier;
    }

    /**
     * Sets Carrier.
     *
     * The shipping carrier being used to ship this fulfillment (such as UPS, FedEx, or USPS).
     *
     * @maps carrier
     */
    public function setCarrier(?string $carrier): void
    {
        $this->carrier = $carrier;
    }

    /**
     * Returns Shipping Note.
     *
     * A note with additional information for the shipping carrier.
     */
    public function getShippingNote(): ?string
    {
        return $this->shippingNote;
    }

    /**
     * Sets Shipping Note.
     *
     * A note with additional information for the shipping carrier.
     *
     * @maps shipping_note
     */
    public function setShippingNote(?string $shippingNote): void
    {
        $this->shippingNote = $shippingNote;
    }

    /**
     * Returns Shipping Type.
     *
     * A description of the type of shipping product purchased from the carrier
     * (such as First Class, Priority, or Express).
     */
    public function getShippingType(): ?string
    {
        return $this->shippingType;
    }

    /**
     * Sets Shipping Type.
     *
     * A description of the type of shipping product purchased from the carrier
     * (such as First Class, Priority, or Express).
     *
     * @maps shipping_type
     */
    public function setShippingType(?string $shippingType): void
    {
        $this->shippingType = $shippingType;
    }

    /**
     * Returns Tracking Number.
     *
     * The reference number provided by the carrier to track the shipment's progress.
     */
    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * Sets Tracking Number.
     *
     * The reference number provided by the carrier to track the shipment's progress.
     *
     * @maps tracking_number
     */
    public function setTrackingNumber(?string $trackingNumber): void
    {
        $this->trackingNumber = $trackingNumber;
    }

    /**
     * Returns Tracking Url.
     *
     * A link to the tracking webpage on the carrier's website.
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    /**
     * Sets Tracking Url.
     *
     * A link to the tracking webpage on the carrier's website.
     *
     * @maps tracking_url
     */
    public function setTrackingUrl(?string $trackingUrl): void
    {
        $this->trackingUrl = $trackingUrl;
    }

    /**
     * Returns Placed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment was requested. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getPlacedAt(): ?string
    {
        return $this->placedAt;
    }

    /**
     * Sets Placed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment was requested. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps placed_at
     */
    public function setPlacedAt(?string $placedAt): void
    {
        $this->placedAt = $placedAt;
    }

    /**
     * Returns In Progress At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `RESERVED` state, which  indicates that
     * preparation
     * of this shipment has begun. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:
     * 33.123Z").
     */
    public function getInProgressAt(): ?string
    {
        return $this->inProgressAt;
    }

    /**
     * Sets In Progress At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `RESERVED` state, which  indicates that
     * preparation
     * of this shipment has begun. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:
     * 33.123Z").
     *
     * @maps in_progress_at
     */
    public function setInProgressAt(?string $inProgressAt): void
    {
        $this->inProgressAt = $inProgressAt;
    }

    /**
     * Returns Packaged At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `PREPARED` state, which indicates that the
     * fulfillment is packaged. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.
     * 123Z").
     */
    public function getPackagedAt(): ?string
    {
        return $this->packagedAt;
    }

    /**
     * Sets Packaged At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `PREPARED` state, which indicates that the
     * fulfillment is packaged. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.
     * 123Z").
     *
     * @maps packaged_at
     */
    public function setPackagedAt(?string $packagedAt): void
    {
        $this->packagedAt = $packagedAt;
    }

    /**
     * Returns Expected Shipped At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment is expected to be delivered to the shipping carrier.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getExpectedShippedAt(): ?string
    {
        return $this->expectedShippedAt;
    }

    /**
     * Sets Expected Shipped At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment is expected to be delivered to the shipping carrier.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps expected_shipped_at
     */
    public function setExpectedShippedAt(?string $expectedShippedAt): void
    {
        $this->expectedShippedAt = $expectedShippedAt;
    }

    /**
     * Returns Shipped At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `COMPLETED` state, which indicates that
     * the fulfillment has been given to the shipping carrier. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getShippedAt(): ?string
    {
        return $this->shippedAt;
    }

    /**
     * Sets Shipped At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `COMPLETED` state, which indicates that
     * the fulfillment has been given to the shipping carrier. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps shipped_at
     */
    public function setShippedAt(?string $shippedAt): void
    {
        $this->shippedAt = $shippedAt;
    }

    /**
     * Returns Canceled At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating the shipment was canceled.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getCanceledAt(): ?string
    {
        return $this->canceledAt;
    }

    /**
     * Sets Canceled At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating the shipment was canceled.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps canceled_at
     */
    public function setCanceledAt(?string $canceledAt): void
    {
        $this->canceledAt = $canceledAt;
    }

    /**
     * Returns Cancel Reason.
     *
     * A description of why the shipment was canceled.
     */
    public function getCancelReason(): ?string
    {
        return $this->cancelReason;
    }

    /**
     * Sets Cancel Reason.
     *
     * A description of why the shipment was canceled.
     *
     * @maps cancel_reason
     */
    public function setCancelReason(?string $cancelReason): void
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * Returns Failed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment failed to be completed. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getFailedAt(): ?string
    {
        return $this->failedAt;
    }

    /**
     * Sets Failed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment failed to be completed. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps failed_at
     */
    public function setFailedAt(?string $failedAt): void
    {
        $this->failedAt = $failedAt;
    }

    /**
     * Returns Failure Reason.
     *
     * A description of why the shipment failed to be completed.
     */
    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }

    /**
     * Sets Failure Reason.
     *
     * A description of why the shipment failed to be completed.
     *
     * @maps failure_reason
     */
    public function setFailureReason(?string $failureReason): void
    {
        $this->failureReason = $failureReason;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->recipient)) {
            $json['recipient']           = $this->recipient;
        }
        if (isset($this->carrier)) {
            $json['carrier']             = $this->carrier;
        }
        if (isset($this->shippingNote)) {
            $json['shipping_note']       = $this->shippingNote;
        }
        if (isset($this->shippingType)) {
            $json['shipping_type']       = $this->shippingType;
        }
        if (isset($this->trackingNumber)) {
            $json['tracking_number']     = $this->trackingNumber;
        }
        if (isset($this->trackingUrl)) {
            $json['tracking_url']        = $this->trackingUrl;
        }
        if (isset($this->placedAt)) {
            $json['placed_at']           = $this->placedAt;
        }
        if (isset($this->inProgressAt)) {
            $json['in_progress_at']      = $this->inProgressAt;
        }
        if (isset($this->packagedAt)) {
            $json['packaged_at']         = $this->packagedAt;
        }
        if (isset($this->expectedShippedAt)) {
            $json['expected_shipped_at'] = $this->expectedShippedAt;
        }
        if (isset($this->shippedAt)) {
            $json['shipped_at']          = $this->shippedAt;
        }
        if (isset($this->canceledAt)) {
            $json['canceled_at']         = $this->canceledAt;
        }
        if (isset($this->cancelReason)) {
            $json['cancel_reason']       = $this->cancelReason;
        }
        if (isset($this->failedAt)) {
            $json['failed_at']           = $this->failedAt;
        }
        if (isset($this->failureReason)) {
            $json['failure_reason']      = $this->failureReason;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
