<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an action processed by the Square Terminal.
 */
class TerminalAction extends JsonSerializableType
{
    /**
     * @var ?string $id A unique ID for this `TerminalAction`.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The unique Id of the device intended for this `TerminalAction`.
     * The Id can be retrieved from /v2/devices api.
     *
     * @var ?string $deviceId
     */
    #[JsonProperty('device_id')]
    private ?string $deviceId;

    /**
     * The duration as an RFC 3339 duration, after which the action will be automatically canceled.
     * TerminalActions that are `PENDING` will be automatically `CANCELED` and have a cancellation reason
     * of `TIMED_OUT`
     *
     * Default: 5 minutes from creation
     *
     * Maximum: 5 minutes
     *
     * @var ?string $deadlineDuration
     */
    #[JsonProperty('deadline_duration')]
    private ?string $deadlineDuration;

    /**
     * The status of the `TerminalAction`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCEL_REQUESTED`, `CANCELED`, `COMPLETED`
     *
     * @var ?string $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * The reason why `TerminalAction` is canceled. Present if the status is `CANCELED`.
     * See [ActionCancelReason](#type-actioncancelreason) for possible values
     *
     * @var ?value-of<ActionCancelReason> $cancelReason
     */
    #[JsonProperty('cancel_reason')]
    private ?string $cancelReason;

    /**
     * @var ?string $createdAt The time when the `TerminalAction` was created as an RFC 3339 timestamp.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The time when the `TerminalAction` was last updated as an RFC 3339 timestamp.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $appId The ID of the application that created the action.
     */
    #[JsonProperty('app_id')]
    private ?string $appId;

    /**
     * @var ?string $locationId The location id the action is attached to, if a link can be made.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * Represents the type of the action.
     * See [ActionType](#type-actiontype) for possible values
     *
     * @var ?value-of<TerminalActionActionType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?QrCodeOptions $qrCodeOptions Describes configuration for the QR code action. Requires `QR_CODE` type.
     */
    #[JsonProperty('qr_code_options')]
    private ?QrCodeOptions $qrCodeOptions;

    /**
     * @var ?SaveCardOptions $saveCardOptions Describes configuration for the save-card action. Requires `SAVE_CARD` type.
     */
    #[JsonProperty('save_card_options')]
    private ?SaveCardOptions $saveCardOptions;

    /**
     * @var ?SignatureOptions $signatureOptions Describes configuration for the signature capture action. Requires `SIGNATURE` type.
     */
    #[JsonProperty('signature_options')]
    private ?SignatureOptions $signatureOptions;

    /**
     * @var ?ConfirmationOptions $confirmationOptions Describes configuration for the confirmation action. Requires `CONFIRMATION` type.
     */
    #[JsonProperty('confirmation_options')]
    private ?ConfirmationOptions $confirmationOptions;

    /**
     * @var ?ReceiptOptions $receiptOptions Describes configuration for the receipt action. Requires `RECEIPT` type.
     */
    #[JsonProperty('receipt_options')]
    private ?ReceiptOptions $receiptOptions;

    /**
     * @var ?DataCollectionOptions $dataCollectionOptions Describes configuration for the data collection action. Requires `DATA_COLLECTION` type.
     */
    #[JsonProperty('data_collection_options')]
    private ?DataCollectionOptions $dataCollectionOptions;

    /**
     * @var ?SelectOptions $selectOptions Describes configuration for the select action. Requires `SELECT` type.
     */
    #[JsonProperty('select_options')]
    private ?SelectOptions $selectOptions;

    /**
     * Details about the Terminal that received the action request (such as battery level,
     * operating system version, and network connection settings).
     *
     * Only available for `PING` action type.
     *
     * @var ?DeviceMetadata $deviceMetadata
     */
    #[JsonProperty('device_metadata')]
    private ?DeviceMetadata $deviceMetadata;

    /**
     * Indicates the action will be linked to another action and requires a waiting dialog to be
     * displayed instead of returning to the idle screen on completion of the action.
     *
     * Only supported on SIGNATURE, CONFIRMATION, DATA_COLLECTION, and SELECT types.
     *
     * @var ?bool $awaitNextAction
     */
    #[JsonProperty('await_next_action')]
    private ?bool $awaitNextAction;

    /**
     * The timeout duration of the waiting dialog as an RFC 3339 duration, after which the
     * waiting dialog will no longer be displayed and the Terminal will return to the idle screen.
     *
     * Default: 5 minutes from when the waiting dialog is displayed
     *
     * Maximum: 5 minutes
     *
     * @var ?string $awaitNextActionDuration
     */
    #[JsonProperty('await_next_action_duration')]
    private ?string $awaitNextActionDuration;

    /**
     * @param array{
     *   id?: ?string,
     *   deviceId?: ?string,
     *   deadlineDuration?: ?string,
     *   status?: ?string,
     *   cancelReason?: ?value-of<ActionCancelReason>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   appId?: ?string,
     *   locationId?: ?string,
     *   type?: ?value-of<TerminalActionActionType>,
     *   qrCodeOptions?: ?QrCodeOptions,
     *   saveCardOptions?: ?SaveCardOptions,
     *   signatureOptions?: ?SignatureOptions,
     *   confirmationOptions?: ?ConfirmationOptions,
     *   receiptOptions?: ?ReceiptOptions,
     *   dataCollectionOptions?: ?DataCollectionOptions,
     *   selectOptions?: ?SelectOptions,
     *   deviceMetadata?: ?DeviceMetadata,
     *   awaitNextAction?: ?bool,
     *   awaitNextActionDuration?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->deviceId = $values['deviceId'] ?? null;
        $this->deadlineDuration = $values['deadlineDuration'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->cancelReason = $values['cancelReason'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->appId = $values['appId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->qrCodeOptions = $values['qrCodeOptions'] ?? null;
        $this->saveCardOptions = $values['saveCardOptions'] ?? null;
        $this->signatureOptions = $values['signatureOptions'] ?? null;
        $this->confirmationOptions = $values['confirmationOptions'] ?? null;
        $this->receiptOptions = $values['receiptOptions'] ?? null;
        $this->dataCollectionOptions = $values['dataCollectionOptions'] ?? null;
        $this->selectOptions = $values['selectOptions'] ?? null;
        $this->deviceMetadata = $values['deviceMetadata'] ?? null;
        $this->awaitNextAction = $values['awaitNextAction'] ?? null;
        $this->awaitNextActionDuration = $values['awaitNextActionDuration'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * @param ?string $value
     */
    public function setDeviceId(?string $value = null): self
    {
        $this->deviceId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeadlineDuration(): ?string
    {
        return $this->deadlineDuration;
    }

    /**
     * @param ?string $value
     */
    public function setDeadlineDuration(?string $value = null): self
    {
        $this->deadlineDuration = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?value-of<ActionCancelReason>
     */
    public function getCancelReason(): ?string
    {
        return $this->cancelReason;
    }

    /**
     * @param ?value-of<ActionCancelReason> $value
     */
    public function setCancelReason(?string $value = null): self
    {
        $this->cancelReason = $value;
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
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAppId(): ?string
    {
        return $this->appId;
    }

    /**
     * @param ?string $value
     */
    public function setAppId(?string $value = null): self
    {
        $this->appId = $value;
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
        return $this;
    }

    /**
     * @return ?value-of<TerminalActionActionType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<TerminalActionActionType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?QrCodeOptions
     */
    public function getQrCodeOptions(): ?QrCodeOptions
    {
        return $this->qrCodeOptions;
    }

    /**
     * @param ?QrCodeOptions $value
     */
    public function setQrCodeOptions(?QrCodeOptions $value = null): self
    {
        $this->qrCodeOptions = $value;
        return $this;
    }

    /**
     * @return ?SaveCardOptions
     */
    public function getSaveCardOptions(): ?SaveCardOptions
    {
        return $this->saveCardOptions;
    }

    /**
     * @param ?SaveCardOptions $value
     */
    public function setSaveCardOptions(?SaveCardOptions $value = null): self
    {
        $this->saveCardOptions = $value;
        return $this;
    }

    /**
     * @return ?SignatureOptions
     */
    public function getSignatureOptions(): ?SignatureOptions
    {
        return $this->signatureOptions;
    }

    /**
     * @param ?SignatureOptions $value
     */
    public function setSignatureOptions(?SignatureOptions $value = null): self
    {
        $this->signatureOptions = $value;
        return $this;
    }

    /**
     * @return ?ConfirmationOptions
     */
    public function getConfirmationOptions(): ?ConfirmationOptions
    {
        return $this->confirmationOptions;
    }

    /**
     * @param ?ConfirmationOptions $value
     */
    public function setConfirmationOptions(?ConfirmationOptions $value = null): self
    {
        $this->confirmationOptions = $value;
        return $this;
    }

    /**
     * @return ?ReceiptOptions
     */
    public function getReceiptOptions(): ?ReceiptOptions
    {
        return $this->receiptOptions;
    }

    /**
     * @param ?ReceiptOptions $value
     */
    public function setReceiptOptions(?ReceiptOptions $value = null): self
    {
        $this->receiptOptions = $value;
        return $this;
    }

    /**
     * @return ?DataCollectionOptions
     */
    public function getDataCollectionOptions(): ?DataCollectionOptions
    {
        return $this->dataCollectionOptions;
    }

    /**
     * @param ?DataCollectionOptions $value
     */
    public function setDataCollectionOptions(?DataCollectionOptions $value = null): self
    {
        $this->dataCollectionOptions = $value;
        return $this;
    }

    /**
     * @return ?SelectOptions
     */
    public function getSelectOptions(): ?SelectOptions
    {
        return $this->selectOptions;
    }

    /**
     * @param ?SelectOptions $value
     */
    public function setSelectOptions(?SelectOptions $value = null): self
    {
        $this->selectOptions = $value;
        return $this;
    }

    /**
     * @return ?DeviceMetadata
     */
    public function getDeviceMetadata(): ?DeviceMetadata
    {
        return $this->deviceMetadata;
    }

    /**
     * @param ?DeviceMetadata $value
     */
    public function setDeviceMetadata(?DeviceMetadata $value = null): self
    {
        $this->deviceMetadata = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAwaitNextAction(): ?bool
    {
        return $this->awaitNextAction;
    }

    /**
     * @param ?bool $value
     */
    public function setAwaitNextAction(?bool $value = null): self
    {
        $this->awaitNextAction = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAwaitNextActionDuration(): ?string
    {
        return $this->awaitNextActionDuration;
    }

    /**
     * @param ?string $value
     */
    public function setAwaitNextActionDuration(?string $value = null): self
    {
        $this->awaitNextActionDuration = $value;
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
