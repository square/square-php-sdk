<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains details necessary to fulfill a pickup order.
 */
class OrderFulfillmentPickupDetails implements \JsonSerializable
{
    /**
     * @var OrderFulfillmentRecipient|null
     */
    private $recipient;

    /**
     * @var string|null
     */
    private $expiresAt;

    /**
     * @var string|null
     */
    private $autoCompleteDuration;

    /**
     * @var string|null
     */
    private $scheduleType;

    /**
     * @var string|null
     */
    private $pickupAt;

    /**
     * @var string|null
     */
    private $pickupWindowDuration;

    /**
     * @var string|null
     */
    private $prepTimeDuration;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var string|null
     */
    private $placedAt;

    /**
     * @var string|null
     */
    private $acceptedAt;

    /**
     * @var string|null
     */
    private $rejectedAt;

    /**
     * @var string|null
     */
    private $readyAt;

    /**
     * @var string|null
     */
    private $expiredAt;

    /**
     * @var string|null
     */
    private $pickedUpAt;

    /**
     * @var string|null
     */
    private $canceledAt;

    /**
     * @var string|null
     */
    private $cancelReason;

    /**
     * @var bool|null
     */
    private $isCurbsidePickup;

    /**
     * @var OrderFulfillmentPickupDetailsCurbsidePickupDetails|null
     */
    private $curbsidePickupDetails;

    /**
     * Returns Recipient.
     *
     * Contains information on the recipient of a fulfillment.
     */
    public function getRecipient(): ?OrderFulfillmentRecipient
    {
        return $this->recipient;
    }

    /**
     * Sets Recipient.
     *
     * Contains information on the recipient of a fulfillment.
     *
     * @maps recipient
     */
    public function setRecipient(?OrderFulfillmentRecipient $recipient): void
    {
        $this->recipient = $recipient;
    }

    /**
     * Returns Expires At.
     *
     * The [timestamp](#workingwithdates) indicating when this fulfillment
     * will expire if it is not accepted. Must be in RFC 3339 format
     * e.g., "2016-09-04T23:59:33.123Z". Expiration time can only be set up to 7
     * days in the future. If `expires_at` is not set, this pickup fulfillment
     * will be automatically accepted when placed.
     */
    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    /**
     * Sets Expires At.
     *
     * The [timestamp](#workingwithdates) indicating when this fulfillment
     * will expire if it is not accepted. Must be in RFC 3339 format
     * e.g., "2016-09-04T23:59:33.123Z". Expiration time can only be set up to 7
     * days in the future. If `expires_at` is not set, this pickup fulfillment
     * will be automatically accepted when placed.
     *
     * @maps expires_at
     */
    public function setExpiresAt(?string $expiresAt): void
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Returns Auto Complete Duration.
     *
     * The duration of time after which an open and accepted pickup fulfillment
     * will automatically move to the `COMPLETED` state. Must be in RFC3339
     * duration format e.g., "P1W3D".
     *
     * If not set, this pickup fulfillment will remain accepted until it is canceled or completed.
     */
    public function getAutoCompleteDuration(): ?string
    {
        return $this->autoCompleteDuration;
    }

    /**
     * Sets Auto Complete Duration.
     *
     * The duration of time after which an open and accepted pickup fulfillment
     * will automatically move to the `COMPLETED` state. Must be in RFC3339
     * duration format e.g., "P1W3D".
     *
     * If not set, this pickup fulfillment will remain accepted until it is canceled or completed.
     *
     * @maps auto_complete_duration
     */
    public function setAutoCompleteDuration(?string $autoCompleteDuration): void
    {
        $this->autoCompleteDuration = $autoCompleteDuration;
    }

    /**
     * Returns Schedule Type.
     *
     * The schedule type of the pickup fulfillment.
     */
    public function getScheduleType(): ?string
    {
        return $this->scheduleType;
    }

    /**
     * Sets Schedule Type.
     *
     * The schedule type of the pickup fulfillment.
     *
     * @maps schedule_type
     */
    public function setScheduleType(?string $scheduleType): void
    {
        $this->scheduleType = $scheduleType;
    }

    /**
     * Returns Pickup At.
     *
     * The [timestamp](#workingwithdates) that represents the start of the pickup window.
     * Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     * For fulfillments with the schedule type `ASAP`, this is automatically set
     * to the current time plus the expected duration to prepare the fulfillment.
     */
    public function getPickupAt(): ?string
    {
        return $this->pickupAt;
    }

    /**
     * Sets Pickup At.
     *
     * The [timestamp](#workingwithdates) that represents the start of the pickup window.
     * Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     * For fulfillments with the schedule type `ASAP`, this is automatically set
     * to the current time plus the expected duration to prepare the fulfillment.
     *
     * @maps pickup_at
     */
    public function setPickupAt(?string $pickupAt): void
    {
        $this->pickupAt = $pickupAt;
    }

    /**
     * Returns Pickup Window Duration.
     *
     * The window of time in which the order should be picked up after the `pickup_at` timestamp.
     * Must be in RFC3339 duration format, e.g., "P1W3D". Can be used as an
     * informational guideline for merchants.
     */
    public function getPickupWindowDuration(): ?string
    {
        return $this->pickupWindowDuration;
    }

    /**
     * Sets Pickup Window Duration.
     *
     * The window of time in which the order should be picked up after the `pickup_at` timestamp.
     * Must be in RFC3339 duration format, e.g., "P1W3D". Can be used as an
     * informational guideline for merchants.
     *
     * @maps pickup_window_duration
     */
    public function setPickupWindowDuration(?string $pickupWindowDuration): void
    {
        $this->pickupWindowDuration = $pickupWindowDuration;
    }

    /**
     * Returns Prep Time Duration.
     *
     * The duration of time it takes to prepare this fulfillment.
     * Must be in RFC3339 duration format, e.g., "P1W3D".
     */
    public function getPrepTimeDuration(): ?string
    {
        return $this->prepTimeDuration;
    }

    /**
     * Sets Prep Time Duration.
     *
     * The duration of time it takes to prepare this fulfillment.
     * Must be in RFC3339 duration format, e.g., "P1W3D".
     *
     * @maps prep_time_duration
     */
    public function setPrepTimeDuration(?string $prepTimeDuration): void
    {
        $this->prepTimeDuration = $prepTimeDuration;
    }

    /**
     * Returns Note.
     *
     * A note meant to provide additional instructions about the pickup
     * fulfillment displayed in the Square Point of Sale and set by the API.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * A note meant to provide additional instructions about the pickup
     * fulfillment displayed in the Square Point of Sale and set by the API.
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Returns Placed At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment
     * was placed. Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     */
    public function getPlacedAt(): ?string
    {
        return $this->placedAt;
    }

    /**
     * Sets Placed At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment
     * was placed. Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     *
     * @maps placed_at
     */
    public function setPlacedAt(?string $placedAt): void
    {
        $this->placedAt = $placedAt;
    }

    /**
     * Returns Accepted At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment
     * was accepted. In RFC3339 timestamp format,
     * e.g., "2016-09-04T23:59:33.123Z".
     */
    public function getAcceptedAt(): ?string
    {
        return $this->acceptedAt;
    }

    /**
     * Sets Accepted At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment
     * was accepted. In RFC3339 timestamp format,
     * e.g., "2016-09-04T23:59:33.123Z".
     *
     * @maps accepted_at
     */
    public function setAcceptedAt(?string $acceptedAt): void
    {
        $this->acceptedAt = $acceptedAt;
    }

    /**
     * Returns Rejected At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment
     * was rejected. In RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     */
    public function getRejectedAt(): ?string
    {
        return $this->rejectedAt;
    }

    /**
     * Sets Rejected At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment
     * was rejected. In RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     *
     * @maps rejected_at
     */
    public function setRejectedAt(?string $rejectedAt): void
    {
        $this->rejectedAt = $rejectedAt;
    }

    /**
     * Returns Ready At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment is
     * marked as ready for pickup. In RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     */
    public function getReadyAt(): ?string
    {
        return $this->readyAt;
    }

    /**
     * Sets Ready At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment is
     * marked as ready for pickup. In RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     *
     * @maps ready_at
     */
    public function setReadyAt(?string $readyAt): void
    {
        $this->readyAt = $readyAt;
    }

    /**
     * Returns Expired At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment expired.
     * In RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     */
    public function getExpiredAt(): ?string
    {
        return $this->expiredAt;
    }

    /**
     * Sets Expired At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment expired.
     * In RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z".
     *
     * @maps expired_at
     */
    public function setExpiredAt(?string $expiredAt): void
    {
        $this->expiredAt = $expiredAt;
    }

    /**
     * Returns Picked up At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment
     * was picked up by the recipient. In RFC3339 timestamp format,
     * e.g., "2016-09-04T23:59:33.123Z".
     */
    public function getPickedUpAt(): ?string
    {
        return $this->pickedUpAt;
    }

    /**
     * Sets Picked up At.
     *
     * The [timestamp](#workingwithdates) indicating when the fulfillment
     * was picked up by the recipient. In RFC3339 timestamp format,
     * e.g., "2016-09-04T23:59:33.123Z".
     *
     * @maps picked_up_at
     */
    public function setPickedUpAt(?string $pickedUpAt): void
    {
        $this->pickedUpAt = $pickedUpAt;
    }

    /**
     * Returns Canceled At.
     *
     * The [timestamp](#workingwithdates) in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z",
     * indicating when the fulfillment was canceled.
     */
    public function getCanceledAt(): ?string
    {
        return $this->canceledAt;
    }

    /**
     * Sets Canceled At.
     *
     * The [timestamp](#workingwithdates) in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z",
     * indicating when the fulfillment was canceled.
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
     * A description of why the pickup was canceled. Max length: 100 characters.
     */
    public function getCancelReason(): ?string
    {
        return $this->cancelReason;
    }

    /**
     * Sets Cancel Reason.
     *
     * A description of why the pickup was canceled. Max length: 100 characters.
     *
     * @maps cancel_reason
     */
    public function setCancelReason(?string $cancelReason): void
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * Returns Is Curbside Pickup.
     *
     * If true, indicates this pickup order is for curbside pickup, not in-store pickup.
     */
    public function getIsCurbsidePickup(): ?bool
    {
        return $this->isCurbsidePickup;
    }

    /**
     * Sets Is Curbside Pickup.
     *
     * If true, indicates this pickup order is for curbside pickup, not in-store pickup.
     *
     * @maps is_curbside_pickup
     */
    public function setIsCurbsidePickup(?bool $isCurbsidePickup): void
    {
        $this->isCurbsidePickup = $isCurbsidePickup;
    }

    /**
     * Returns Curbside Pickup Details.
     *
     * Specific details for curbside pickup.
     */
    public function getCurbsidePickupDetails(): ?OrderFulfillmentPickupDetailsCurbsidePickupDetails
    {
        return $this->curbsidePickupDetails;
    }

    /**
     * Sets Curbside Pickup Details.
     *
     * Specific details for curbside pickup.
     *
     * @maps curbside_pickup_details
     */
    public function setCurbsidePickupDetails(
        ?OrderFulfillmentPickupDetailsCurbsidePickupDetails $curbsidePickupDetails
    ): void {
        $this->curbsidePickupDetails = $curbsidePickupDetails;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['recipient']             = $this->recipient;
        $json['expires_at']            = $this->expiresAt;
        $json['auto_complete_duration'] = $this->autoCompleteDuration;
        $json['schedule_type']         = $this->scheduleType;
        $json['pickup_at']             = $this->pickupAt;
        $json['pickup_window_duration'] = $this->pickupWindowDuration;
        $json['prep_time_duration']    = $this->prepTimeDuration;
        $json['note']                  = $this->note;
        $json['placed_at']             = $this->placedAt;
        $json['accepted_at']           = $this->acceptedAt;
        $json['rejected_at']           = $this->rejectedAt;
        $json['ready_at']              = $this->readyAt;
        $json['expired_at']            = $this->expiredAt;
        $json['picked_up_at']          = $this->pickedUpAt;
        $json['canceled_at']           = $this->canceledAt;
        $json['cancel_reason']         = $this->cancelReason;
        $json['is_curbside_pickup']    = $this->isCurbsidePickup;
        $json['curbside_pickup_details'] = $this->curbsidePickupDetails;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
