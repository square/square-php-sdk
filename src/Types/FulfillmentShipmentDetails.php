<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains the details necessary to fulfill a shipment order.
 */
class FulfillmentShipmentDetails extends JsonSerializableType
{
    /**
     * @var ?FulfillmentRecipient $recipient Information about the person to receive this shipment fulfillment.
     */
    #[JsonProperty('recipient')]
    private ?FulfillmentRecipient $recipient;

    /**
     * @var ?string $carrier The shipping carrier being used to ship this fulfillment (such as UPS, FedEx, or USPS).
     */
    #[JsonProperty('carrier')]
    private ?string $carrier;

    /**
     * @var ?string $shippingNote A note with additional information for the shipping carrier.
     */
    #[JsonProperty('shipping_note')]
    private ?string $shippingNote;

    /**
     * A description of the type of shipping product purchased from the carrier
     * (such as First Class, Priority, or Express).
     *
     * @var ?string $shippingType
     */
    #[JsonProperty('shipping_type')]
    private ?string $shippingType;

    /**
     * @var ?string $trackingNumber The reference number provided by the carrier to track the shipment's progress.
     */
    #[JsonProperty('tracking_number')]
    private ?string $trackingNumber;

    /**
     * @var ?string $trackingUrl A link to the tracking webpage on the carrier's website.
     */
    #[JsonProperty('tracking_url')]
    private ?string $trackingUrl;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment was requested. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $placedAt
     */
    #[JsonProperty('placed_at')]
    private ?string $placedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `RESERVED` state, which  indicates that preparation
     * of this shipment has begun. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $inProgressAt
     */
    #[JsonProperty('in_progress_at')]
    private ?string $inProgressAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `PREPARED` state, which indicates that the
     * fulfillment is packaged. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $packagedAt
     */
    #[JsonProperty('packaged_at')]
    private ?string $packagedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment is expected to be delivered to the shipping carrier.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $expectedShippedAt
     */
    #[JsonProperty('expected_shipped_at')]
    private ?string $expectedShippedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `COMPLETED` state, which indicates that
     * the fulfillment has been given to the shipping carrier. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $shippedAt
     */
    #[JsonProperty('shipped_at')]
    private ?string $shippedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating the shipment was canceled.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $canceledAt
     */
    #[JsonProperty('canceled_at')]
    private ?string $canceledAt;

    /**
     * @var ?string $cancelReason A description of why the shipment was canceled.
     */
    #[JsonProperty('cancel_reason')]
    private ?string $cancelReason;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment failed to be completed. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $failedAt
     */
    #[JsonProperty('failed_at')]
    private ?string $failedAt;

    /**
     * @var ?string $failureReason A description of why the shipment failed to be completed.
     */
    #[JsonProperty('failure_reason')]
    private ?string $failureReason;

    /**
     * @param array{
     *   recipient?: ?FulfillmentRecipient,
     *   carrier?: ?string,
     *   shippingNote?: ?string,
     *   shippingType?: ?string,
     *   trackingNumber?: ?string,
     *   trackingUrl?: ?string,
     *   placedAt?: ?string,
     *   inProgressAt?: ?string,
     *   packagedAt?: ?string,
     *   expectedShippedAt?: ?string,
     *   shippedAt?: ?string,
     *   canceledAt?: ?string,
     *   cancelReason?: ?string,
     *   failedAt?: ?string,
     *   failureReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->recipient = $values['recipient'] ?? null;
        $this->carrier = $values['carrier'] ?? null;
        $this->shippingNote = $values['shippingNote'] ?? null;
        $this->shippingType = $values['shippingType'] ?? null;
        $this->trackingNumber = $values['trackingNumber'] ?? null;
        $this->trackingUrl = $values['trackingUrl'] ?? null;
        $this->placedAt = $values['placedAt'] ?? null;
        $this->inProgressAt = $values['inProgressAt'] ?? null;
        $this->packagedAt = $values['packagedAt'] ?? null;
        $this->expectedShippedAt = $values['expectedShippedAt'] ?? null;
        $this->shippedAt = $values['shippedAt'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->cancelReason = $values['cancelReason'] ?? null;
        $this->failedAt = $values['failedAt'] ?? null;
        $this->failureReason = $values['failureReason'] ?? null;
    }

    /**
     * @return ?FulfillmentRecipient
     */
    public function getRecipient(): ?FulfillmentRecipient
    {
        return $this->recipient;
    }

    /**
     * @param ?FulfillmentRecipient $value
     */
    public function setRecipient(?FulfillmentRecipient $value = null): self
    {
        $this->recipient = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCarrier(): ?string
    {
        return $this->carrier;
    }

    /**
     * @param ?string $value
     */
    public function setCarrier(?string $value = null): self
    {
        $this->carrier = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getShippingNote(): ?string
    {
        return $this->shippingNote;
    }

    /**
     * @param ?string $value
     */
    public function setShippingNote(?string $value = null): self
    {
        $this->shippingNote = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getShippingType(): ?string
    {
        return $this->shippingType;
    }

    /**
     * @param ?string $value
     */
    public function setShippingType(?string $value = null): self
    {
        $this->shippingType = $value;
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
     * @return ?string
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    /**
     * @param ?string $value
     */
    public function setTrackingUrl(?string $value = null): self
    {
        $this->trackingUrl = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPlacedAt(): ?string
    {
        return $this->placedAt;
    }

    /**
     * @param ?string $value
     */
    public function setPlacedAt(?string $value = null): self
    {
        $this->placedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getInProgressAt(): ?string
    {
        return $this->inProgressAt;
    }

    /**
     * @param ?string $value
     */
    public function setInProgressAt(?string $value = null): self
    {
        $this->inProgressAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPackagedAt(): ?string
    {
        return $this->packagedAt;
    }

    /**
     * @param ?string $value
     */
    public function setPackagedAt(?string $value = null): self
    {
        $this->packagedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExpectedShippedAt(): ?string
    {
        return $this->expectedShippedAt;
    }

    /**
     * @param ?string $value
     */
    public function setExpectedShippedAt(?string $value = null): self
    {
        $this->expectedShippedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getShippedAt(): ?string
    {
        return $this->shippedAt;
    }

    /**
     * @param ?string $value
     */
    public function setShippedAt(?string $value = null): self
    {
        $this->shippedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCanceledAt(): ?string
    {
        return $this->canceledAt;
    }

    /**
     * @param ?string $value
     */
    public function setCanceledAt(?string $value = null): self
    {
        $this->canceledAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCancelReason(): ?string
    {
        return $this->cancelReason;
    }

    /**
     * @param ?string $value
     */
    public function setCancelReason(?string $value = null): self
    {
        $this->cancelReason = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFailedAt(): ?string
    {
        return $this->failedAt;
    }

    /**
     * @param ?string $value
     */
    public function setFailedAt(?string $value = null): self
    {
        $this->failedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFailureReason(): ?string
    {
        return $this->failureReason;
    }

    /**
     * @param ?string $value
     */
    public function setFailureReason(?string $value = null): self
    {
        $this->failureReason = $value;
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
