<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes delivery details of an order fulfillment.
 */
class FulfillmentDeliveryDetails extends JsonSerializableType
{
    /**
     * @var ?FulfillmentRecipient $recipient The contact information for the person to receive the fulfillment.
     */
    #[JsonProperty('recipient')]
    private ?FulfillmentRecipient $recipient;

    /**
     * Indicates the fulfillment delivery schedule type. If `SCHEDULED`, then
     * `deliver_at` is required. If `ASAP`, then `prep_time_duration` is required. The default is `SCHEDULED`.
     * See [OrderFulfillmentDeliveryDetailsScheduleType](#type-orderfulfillmentdeliverydetailsscheduletype) for possible values
     *
     * @var ?value-of<FulfillmentDeliveryDetailsOrderFulfillmentDeliveryDetailsScheduleType> $scheduleType
     */
    #[JsonProperty('schedule_type')]
    private ?string $scheduleType;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was placed.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * Must be in RFC 3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     *
     * @var ?string $placedAt
     */
    #[JsonProperty('placed_at')]
    private ?string $placedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * that represents the start of the delivery period.
     * When the fulfillment `schedule_type` is `ASAP`, the field is automatically
     * set to the current time plus the `prep_time_duration`.
     * Otherwise, the application can set this field while the fulfillment `state` is
     * `PROPOSED`, `RESERVED`, or `PREPARED` (any time before the
     * terminal state such as `COMPLETED`, `CANCELED`, and `FAILED`).
     *
     * The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $deliverAt
     */
    #[JsonProperty('deliver_at')]
    private ?string $deliverAt;

    /**
     * The duration of time it takes to prepare and deliver this fulfillment.
     * The duration must be in RFC 3339 format (for example, "P1W3D").
     *
     * @var ?string $prepTimeDuration
     */
    #[JsonProperty('prep_time_duration')]
    private ?string $prepTimeDuration;

    /**
     * The time period after `deliver_at` in which to deliver the order.
     * Applications can set this field when the fulfillment `state` is
     * `PROPOSED`, `RESERVED`, or `PREPARED` (any time before the terminal state
     * such as `COMPLETED`, `CANCELED`, and `FAILED`).
     *
     * The duration must be in RFC 3339 format (for example, "P1W3D").
     *
     * @var ?string $deliveryWindowDuration
     */
    #[JsonProperty('delivery_window_duration')]
    private ?string $deliveryWindowDuration;

    /**
     * Provides additional instructions about the delivery fulfillment.
     * It is displayed in the Square Point of Sale application and set by the API.
     *
     * @var ?string $note
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicates when the seller completed the fulfillment.
     * This field is automatically set when  fulfillment `state` changes to `COMPLETED`.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $completedAt
     */
    #[JsonProperty('completed_at')]
    private ?string $completedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicates when the seller started processing the fulfillment.
     * This field is automatically set when the fulfillment `state` changes to `RESERVED`.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $inProgressAt
     */
    #[JsonProperty('in_progress_at')]
    private ?string $inProgressAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was rejected. This field is
     * automatically set when the fulfillment `state` changes to `FAILED`.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $rejectedAt
     */
    #[JsonProperty('rejected_at')]
    private ?string $rejectedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the seller marked the fulfillment as ready for
     * courier pickup. This field is automatically set when the fulfillment `state` changes
     * to PREPARED.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $readyAt
     */
    #[JsonProperty('ready_at')]
    private ?string $readyAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was delivered to the recipient.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $deliveredAt
     */
    #[JsonProperty('delivered_at')]
    private ?string $deliveredAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was canceled. This field is automatically
     * set when the fulfillment `state` changes to `CANCELED`.
     *
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $canceledAt
     */
    #[JsonProperty('canceled_at')]
    private ?string $canceledAt;

    /**
     * @var ?string $cancelReason The delivery cancellation reason. Max length: 100 characters.
     */
    #[JsonProperty('cancel_reason')]
    private ?string $cancelReason;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when an order can be picked up by the courier for delivery.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $courierPickupAt
     */
    #[JsonProperty('courier_pickup_at')]
    private ?string $courierPickupAt;

    /**
     * The time period after `courier_pickup_at` in which the courier should pick up the order.
     * The duration must be in RFC 3339 format (for example, "P1W3D").
     *
     * @var ?string $courierPickupWindowDuration
     */
    #[JsonProperty('courier_pickup_window_duration')]
    private ?string $courierPickupWindowDuration;

    /**
     * @var ?bool $isNoContactDelivery Whether the delivery is preferred to be no contact.
     */
    #[JsonProperty('is_no_contact_delivery')]
    private ?bool $isNoContactDelivery;

    /**
     * @var ?string $dropoffNotes A note to provide additional instructions about how to deliver the order.
     */
    #[JsonProperty('dropoff_notes')]
    private ?string $dropoffNotes;

    /**
     * @var ?string $courierProviderName The name of the courier provider.
     */
    #[JsonProperty('courier_provider_name')]
    private ?string $courierProviderName;

    /**
     * @var ?string $courierSupportPhoneNumber The support phone number of the courier.
     */
    #[JsonProperty('courier_support_phone_number')]
    private ?string $courierSupportPhoneNumber;

    /**
     * @var ?string $squareDeliveryId The identifier for the delivery created by Square.
     */
    #[JsonProperty('square_delivery_id')]
    private ?string $squareDeliveryId;

    /**
     * @var ?string $externalDeliveryId The identifier for the delivery created by the third-party courier service.
     */
    #[JsonProperty('external_delivery_id')]
    private ?string $externalDeliveryId;

    /**
     * The flag to indicate the delivery is managed by a third party (ie DoorDash), which means
     * we may not receive all recipient information for PII purposes.
     *
     * @var ?bool $managedDelivery
     */
    #[JsonProperty('managed_delivery')]
    private ?bool $managedDelivery;

    /**
     * @param array{
     *   recipient?: ?FulfillmentRecipient,
     *   scheduleType?: ?value-of<FulfillmentDeliveryDetailsOrderFulfillmentDeliveryDetailsScheduleType>,
     *   placedAt?: ?string,
     *   deliverAt?: ?string,
     *   prepTimeDuration?: ?string,
     *   deliveryWindowDuration?: ?string,
     *   note?: ?string,
     *   completedAt?: ?string,
     *   inProgressAt?: ?string,
     *   rejectedAt?: ?string,
     *   readyAt?: ?string,
     *   deliveredAt?: ?string,
     *   canceledAt?: ?string,
     *   cancelReason?: ?string,
     *   courierPickupAt?: ?string,
     *   courierPickupWindowDuration?: ?string,
     *   isNoContactDelivery?: ?bool,
     *   dropoffNotes?: ?string,
     *   courierProviderName?: ?string,
     *   courierSupportPhoneNumber?: ?string,
     *   squareDeliveryId?: ?string,
     *   externalDeliveryId?: ?string,
     *   managedDelivery?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->recipient = $values['recipient'] ?? null;
        $this->scheduleType = $values['scheduleType'] ?? null;
        $this->placedAt = $values['placedAt'] ?? null;
        $this->deliverAt = $values['deliverAt'] ?? null;
        $this->prepTimeDuration = $values['prepTimeDuration'] ?? null;
        $this->deliveryWindowDuration = $values['deliveryWindowDuration'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->inProgressAt = $values['inProgressAt'] ?? null;
        $this->rejectedAt = $values['rejectedAt'] ?? null;
        $this->readyAt = $values['readyAt'] ?? null;
        $this->deliveredAt = $values['deliveredAt'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->cancelReason = $values['cancelReason'] ?? null;
        $this->courierPickupAt = $values['courierPickupAt'] ?? null;
        $this->courierPickupWindowDuration = $values['courierPickupWindowDuration'] ?? null;
        $this->isNoContactDelivery = $values['isNoContactDelivery'] ?? null;
        $this->dropoffNotes = $values['dropoffNotes'] ?? null;
        $this->courierProviderName = $values['courierProviderName'] ?? null;
        $this->courierSupportPhoneNumber = $values['courierSupportPhoneNumber'] ?? null;
        $this->squareDeliveryId = $values['squareDeliveryId'] ?? null;
        $this->externalDeliveryId = $values['externalDeliveryId'] ?? null;
        $this->managedDelivery = $values['managedDelivery'] ?? null;
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
     * @return ?value-of<FulfillmentDeliveryDetailsOrderFulfillmentDeliveryDetailsScheduleType>
     */
    public function getScheduleType(): ?string
    {
        return $this->scheduleType;
    }

    /**
     * @param ?value-of<FulfillmentDeliveryDetailsOrderFulfillmentDeliveryDetailsScheduleType> $value
     */
    public function setScheduleType(?string $value = null): self
    {
        $this->scheduleType = $value;
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
    public function getDeliverAt(): ?string
    {
        return $this->deliverAt;
    }

    /**
     * @param ?string $value
     */
    public function setDeliverAt(?string $value = null): self
    {
        $this->deliverAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPrepTimeDuration(): ?string
    {
        return $this->prepTimeDuration;
    }

    /**
     * @param ?string $value
     */
    public function setPrepTimeDuration(?string $value = null): self
    {
        $this->prepTimeDuration = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeliveryWindowDuration(): ?string
    {
        return $this->deliveryWindowDuration;
    }

    /**
     * @param ?string $value
     */
    public function setDeliveryWindowDuration(?string $value = null): self
    {
        $this->deliveryWindowDuration = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param ?string $value
     */
    public function setNote(?string $value = null): self
    {
        $this->note = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompletedAt(): ?string
    {
        return $this->completedAt;
    }

    /**
     * @param ?string $value
     */
    public function setCompletedAt(?string $value = null): self
    {
        $this->completedAt = $value;
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
    public function getRejectedAt(): ?string
    {
        return $this->rejectedAt;
    }

    /**
     * @param ?string $value
     */
    public function setRejectedAt(?string $value = null): self
    {
        $this->rejectedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReadyAt(): ?string
    {
        return $this->readyAt;
    }

    /**
     * @param ?string $value
     */
    public function setReadyAt(?string $value = null): self
    {
        $this->readyAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeliveredAt(): ?string
    {
        return $this->deliveredAt;
    }

    /**
     * @param ?string $value
     */
    public function setDeliveredAt(?string $value = null): self
    {
        $this->deliveredAt = $value;
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
    public function getCourierPickupAt(): ?string
    {
        return $this->courierPickupAt;
    }

    /**
     * @param ?string $value
     */
    public function setCourierPickupAt(?string $value = null): self
    {
        $this->courierPickupAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCourierPickupWindowDuration(): ?string
    {
        return $this->courierPickupWindowDuration;
    }

    /**
     * @param ?string $value
     */
    public function setCourierPickupWindowDuration(?string $value = null): self
    {
        $this->courierPickupWindowDuration = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsNoContactDelivery(): ?bool
    {
        return $this->isNoContactDelivery;
    }

    /**
     * @param ?bool $value
     */
    public function setIsNoContactDelivery(?bool $value = null): self
    {
        $this->isNoContactDelivery = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDropoffNotes(): ?string
    {
        return $this->dropoffNotes;
    }

    /**
     * @param ?string $value
     */
    public function setDropoffNotes(?string $value = null): self
    {
        $this->dropoffNotes = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCourierProviderName(): ?string
    {
        return $this->courierProviderName;
    }

    /**
     * @param ?string $value
     */
    public function setCourierProviderName(?string $value = null): self
    {
        $this->courierProviderName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCourierSupportPhoneNumber(): ?string
    {
        return $this->courierSupportPhoneNumber;
    }

    /**
     * @param ?string $value
     */
    public function setCourierSupportPhoneNumber(?string $value = null): self
    {
        $this->courierSupportPhoneNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSquareDeliveryId(): ?string
    {
        return $this->squareDeliveryId;
    }

    /**
     * @param ?string $value
     */
    public function setSquareDeliveryId(?string $value = null): self
    {
        $this->squareDeliveryId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExternalDeliveryId(): ?string
    {
        return $this->externalDeliveryId;
    }

    /**
     * @param ?string $value
     */
    public function setExternalDeliveryId(?string $value = null): self
    {
        $this->externalDeliveryId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getManagedDelivery(): ?bool
    {
        return $this->managedDelivery;
    }

    /**
     * @param ?bool $value
     */
    public function setManagedDelivery(?bool $value = null): self
    {
        $this->managedDelivery = $value;
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
