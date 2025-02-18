<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains details necessary to fulfill a pickup order.
 */
class FulfillmentPickupDetails extends JsonSerializableType
{
    /**
     * Information about the person to pick up this fulfillment from a physical
     * location.
     *
     * @var ?FulfillmentRecipient $recipient
     */
    #[JsonProperty('recipient')]
    private ?FulfillmentRecipient $recipient;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment expires if it is not marked in progress. The timestamp must be
     * in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z"). The expiration time can only be set
     * up to 7 days in the future. If `expires_at` is not set, any new payments attached to the order
     * are automatically completed.
     *
     * @var ?string $expiresAt
     */
    #[JsonProperty('expires_at')]
    private ?string $expiresAt;

    /**
     * The duration of time after which an in progress pickup fulfillment is automatically moved
     * to the `COMPLETED` state. The duration must be in RFC 3339 format (for example, "P1W3D").
     *
     * If not set, this pickup fulfillment remains in progress until it is canceled or completed.
     *
     * @var ?string $autoCompleteDuration
     */
    #[JsonProperty('auto_complete_duration')]
    private ?string $autoCompleteDuration;

    /**
     * The schedule type of the pickup fulfillment. Defaults to `SCHEDULED`.
     * See [FulfillmentPickupDetailsScheduleType](#type-fulfillmentpickupdetailsscheduletype) for possible values
     *
     * @var ?value-of<FulfillmentPickupDetailsScheduleType> $scheduleType
     */
    #[JsonProperty('schedule_type')]
    private ?string $scheduleType;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * that represents the start of the pickup window. Must be in RFC 3339 timestamp format, e.g.,
     * "2016-09-04T23:59:33.123Z".
     *
     * For fulfillments with the schedule type `ASAP`, this is automatically set
     * to the current time plus the expected duration to prepare the fulfillment.
     *
     * @var ?string $pickupAt
     */
    #[JsonProperty('pickup_at')]
    private ?string $pickupAt;

    /**
     * The window of time in which the order should be picked up after the `pickup_at` timestamp.
     * Must be in RFC 3339 duration format, e.g., "P1W3D". Can be used as an
     * informational guideline for merchants.
     *
     * @var ?string $pickupWindowDuration
     */
    #[JsonProperty('pickup_window_duration')]
    private ?string $pickupWindowDuration;

    /**
     * The duration of time it takes to prepare this fulfillment.
     * The duration must be in RFC 3339 format (for example, "P1W3D").
     *
     * @var ?string $prepTimeDuration
     */
    #[JsonProperty('prep_time_duration')]
    private ?string $prepTimeDuration;

    /**
     * A note to provide additional instructions about the pickup
     * fulfillment displayed in the Square Point of Sale application and set by the API.
     *
     * @var ?string $note
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was placed. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $placedAt
     */
    #[JsonProperty('placed_at')]
    private ?string $placedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was marked in progress. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $acceptedAt
     */
    #[JsonProperty('accepted_at')]
    private ?string $acceptedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was rejected. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $rejectedAt
     */
    #[JsonProperty('rejected_at')]
    private ?string $rejectedAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment is marked as ready for pickup. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $readyAt
     */
    #[JsonProperty('ready_at')]
    private ?string $readyAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment expired. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $expiredAt
     */
    #[JsonProperty('expired_at')]
    private ?string $expiredAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was picked up by the recipient. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $pickedUpAt
     */
    #[JsonProperty('picked_up_at')]
    private ?string $pickedUpAt;

    /**
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was canceled. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @var ?string $canceledAt
     */
    #[JsonProperty('canceled_at')]
    private ?string $canceledAt;

    /**
     * @var ?string $cancelReason A description of why the pickup was canceled. The maximum length: 100 characters.
     */
    #[JsonProperty('cancel_reason')]
    private ?string $cancelReason;

    /**
     * @var ?bool $isCurbsidePickup If set to `true`, indicates that this pickup order is for curbside pickup, not in-store pickup.
     */
    #[JsonProperty('is_curbside_pickup')]
    private ?bool $isCurbsidePickup;

    /**
     * @var ?FulfillmentPickupDetailsCurbsidePickupDetails $curbsidePickupDetails Specific details for curbside pickup. These details can only be populated if `is_curbside_pickup` is set to `true`.
     */
    #[JsonProperty('curbside_pickup_details')]
    private ?FulfillmentPickupDetailsCurbsidePickupDetails $curbsidePickupDetails;

    /**
     * @param array{
     *   recipient?: ?FulfillmentRecipient,
     *   expiresAt?: ?string,
     *   autoCompleteDuration?: ?string,
     *   scheduleType?: ?value-of<FulfillmentPickupDetailsScheduleType>,
     *   pickupAt?: ?string,
     *   pickupWindowDuration?: ?string,
     *   prepTimeDuration?: ?string,
     *   note?: ?string,
     *   placedAt?: ?string,
     *   acceptedAt?: ?string,
     *   rejectedAt?: ?string,
     *   readyAt?: ?string,
     *   expiredAt?: ?string,
     *   pickedUpAt?: ?string,
     *   canceledAt?: ?string,
     *   cancelReason?: ?string,
     *   isCurbsidePickup?: ?bool,
     *   curbsidePickupDetails?: ?FulfillmentPickupDetailsCurbsidePickupDetails,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->recipient = $values['recipient'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->autoCompleteDuration = $values['autoCompleteDuration'] ?? null;
        $this->scheduleType = $values['scheduleType'] ?? null;
        $this->pickupAt = $values['pickupAt'] ?? null;
        $this->pickupWindowDuration = $values['pickupWindowDuration'] ?? null;
        $this->prepTimeDuration = $values['prepTimeDuration'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->placedAt = $values['placedAt'] ?? null;
        $this->acceptedAt = $values['acceptedAt'] ?? null;
        $this->rejectedAt = $values['rejectedAt'] ?? null;
        $this->readyAt = $values['readyAt'] ?? null;
        $this->expiredAt = $values['expiredAt'] ?? null;
        $this->pickedUpAt = $values['pickedUpAt'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->cancelReason = $values['cancelReason'] ?? null;
        $this->isCurbsidePickup = $values['isCurbsidePickup'] ?? null;
        $this->curbsidePickupDetails = $values['curbsidePickupDetails'] ?? null;
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
    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    /**
     * @param ?string $value
     */
    public function setExpiresAt(?string $value = null): self
    {
        $this->expiresAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAutoCompleteDuration(): ?string
    {
        return $this->autoCompleteDuration;
    }

    /**
     * @param ?string $value
     */
    public function setAutoCompleteDuration(?string $value = null): self
    {
        $this->autoCompleteDuration = $value;
        return $this;
    }

    /**
     * @return ?value-of<FulfillmentPickupDetailsScheduleType>
     */
    public function getScheduleType(): ?string
    {
        return $this->scheduleType;
    }

    /**
     * @param ?value-of<FulfillmentPickupDetailsScheduleType> $value
     */
    public function setScheduleType(?string $value = null): self
    {
        $this->scheduleType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPickupAt(): ?string
    {
        return $this->pickupAt;
    }

    /**
     * @param ?string $value
     */
    public function setPickupAt(?string $value = null): self
    {
        $this->pickupAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPickupWindowDuration(): ?string
    {
        return $this->pickupWindowDuration;
    }

    /**
     * @param ?string $value
     */
    public function setPickupWindowDuration(?string $value = null): self
    {
        $this->pickupWindowDuration = $value;
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
    public function getAcceptedAt(): ?string
    {
        return $this->acceptedAt;
    }

    /**
     * @param ?string $value
     */
    public function setAcceptedAt(?string $value = null): self
    {
        $this->acceptedAt = $value;
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
    public function getExpiredAt(): ?string
    {
        return $this->expiredAt;
    }

    /**
     * @param ?string $value
     */
    public function setExpiredAt(?string $value = null): self
    {
        $this->expiredAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPickedUpAt(): ?string
    {
        return $this->pickedUpAt;
    }

    /**
     * @param ?string $value
     */
    public function setPickedUpAt(?string $value = null): self
    {
        $this->pickedUpAt = $value;
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
     * @return ?bool
     */
    public function getIsCurbsidePickup(): ?bool
    {
        return $this->isCurbsidePickup;
    }

    /**
     * @param ?bool $value
     */
    public function setIsCurbsidePickup(?bool $value = null): self
    {
        $this->isCurbsidePickup = $value;
        return $this;
    }

    /**
     * @return ?FulfillmentPickupDetailsCurbsidePickupDetails
     */
    public function getCurbsidePickupDetails(): ?FulfillmentPickupDetailsCurbsidePickupDetails
    {
        return $this->curbsidePickupDetails;
    }

    /**
     * @param ?FulfillmentPickupDetailsCurbsidePickupDetails $value
     */
    public function setCurbsidePickupDetails(?FulfillmentPickupDetailsCurbsidePickupDetails $value = null): self
    {
        $this->curbsidePickupDetails = $value;
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
