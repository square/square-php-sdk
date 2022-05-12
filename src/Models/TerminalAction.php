<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class TerminalAction implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $deviceId;

    /**
     * @var string|null
     */
    private $deadlineDuration;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $cancelReason;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $appId;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var SaveCardOptions|null
     */
    private $saveCardOptions;

    /**
     * Returns Id.
     * A unique ID for this `TerminalAction`.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     * A unique ID for this `TerminalAction`.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Device Id.
     * The unique Id of the device intended for this `TerminalAction`.
     * The Id can be retrieved from /v2/devices api.
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     * The unique Id of the device intended for this `TerminalAction`.
     * The Id can be retrieved from /v2/devices api.
     *
     * @maps device_id
     */
    public function setDeviceId(?string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Deadline Duration.
     * The duration as an RFC 3339 duration, after which the action will be automatically canceled.
     * TerminalActions that are `PENDING` will be automatically `CANCELED` and have a cancellation reason
     * of `TIMED_OUT`
     *
     * Default: 5 minutes from creation
     *
     * Maximum: 5 minutes
     */
    public function getDeadlineDuration(): ?string
    {
        return $this->deadlineDuration;
    }

    /**
     * Sets Deadline Duration.
     * The duration as an RFC 3339 duration, after which the action will be automatically canceled.
     * TerminalActions that are `PENDING` will be automatically `CANCELED` and have a cancellation reason
     * of `TIMED_OUT`
     *
     * Default: 5 minutes from creation
     *
     * Maximum: 5 minutes
     *
     * @maps deadline_duration
     */
    public function setDeadlineDuration(?string $deadlineDuration): void
    {
        $this->deadlineDuration = $deadlineDuration;
    }

    /**
     * Returns Status.
     * The status of the `TerminalAction`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCELED`, `COMPLETED`
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     * The status of the `TerminalAction`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCELED`, `COMPLETED`
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Cancel Reason.
     */
    public function getCancelReason(): ?string
    {
        return $this->cancelReason;
    }

    /**
     * Sets Cancel Reason.
     *
     * @maps cancel_reason
     * @factory \Square\Models\ActionCancelReason::checkValue
     */
    public function setCancelReason(?string $cancelReason): void
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * Returns Created At.
     * The time when the `TerminalAction` was created as an RFC 3339 timestamp.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     * The time when the `TerminalAction` was created as an RFC 3339 timestamp.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     * The time when the `TerminalAction` was last updated as an RFC 3339 timestamp.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     * The time when the `TerminalAction` was last updated as an RFC 3339 timestamp.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns App Id.
     * The ID of the application that created the action.
     */
    public function getAppId(): ?string
    {
        return $this->appId;
    }

    /**
     * Sets App Id.
     * The ID of the application that created the action.
     *
     * @maps app_id
     */
    public function setAppId(?string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * Returns Type.
     * Describes the type of this unit and indicates which field contains the unit information. This is an
     * ‘open’ enum.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     * Describes the type of this unit and indicates which field contains the unit information. This is an
     * ‘open’ enum.
     *
     * @maps type
     * @factory \Square\Models\TerminalActionActionType::checkValue
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Save Card Options.
     * Describes save-card action fields.
     */
    public function getSaveCardOptions(): ?SaveCardOptions
    {
        return $this->saveCardOptions;
    }

    /**
     * Sets Save Card Options.
     * Describes save-card action fields.
     *
     * @maps save_card_options
     */
    public function setSaveCardOptions(?SaveCardOptions $saveCardOptions): void
    {
        $this->saveCardOptions = $saveCardOptions;
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
        if (isset($this->id)) {
            $json['id']                = $this->id;
        }
        if (isset($this->deviceId)) {
            $json['device_id']         = $this->deviceId;
        }
        if (isset($this->deadlineDuration)) {
            $json['deadline_duration'] = $this->deadlineDuration;
        }
        if (isset($this->status)) {
            $json['status']            = $this->status;
        }
        if (isset($this->cancelReason)) {
            $json['cancel_reason']     = ActionCancelReason::checkValue($this->cancelReason);
        }
        if (isset($this->createdAt)) {
            $json['created_at']        = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']        = $this->updatedAt;
        }
        if (isset($this->appId)) {
            $json['app_id']            = $this->appId;
        }
        if (isset($this->type)) {
            $json['type']              = TerminalActionActionType::checkValue($this->type);
        }
        if (isset($this->saveCardOptions)) {
            $json['save_card_options'] = $this->saveCardOptions;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
