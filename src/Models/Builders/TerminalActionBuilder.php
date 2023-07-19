<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ConfirmationOptions;
use Square\Models\DataCollectionOptions;
use Square\Models\DeviceMetadata;
use Square\Models\QrCodeOptions;
use Square\Models\ReceiptOptions;
use Square\Models\SaveCardOptions;
use Square\Models\SelectOptions;
use Square\Models\SignatureOptions;
use Square\Models\TerminalAction;

/**
 * Builder for model TerminalAction
 *
 * @see TerminalAction
 */
class TerminalActionBuilder
{
    /**
     * @var TerminalAction
     */
    private $instance;

    private function __construct(TerminalAction $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new terminal action Builder object.
     */
    public static function init(): self
    {
        return new self(new TerminalAction());
    }

    /**
     * Sets id field.
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets device id field.
     */
    public function deviceId(?string $value): self
    {
        $this->instance->setDeviceId($value);
        return $this;
    }

    /**
     * Unsets device id field.
     */
    public function unsetDeviceId(): self
    {
        $this->instance->unsetDeviceId();
        return $this;
    }

    /**
     * Sets deadline duration field.
     */
    public function deadlineDuration(?string $value): self
    {
        $this->instance->setDeadlineDuration($value);
        return $this;
    }

    /**
     * Unsets deadline duration field.
     */
    public function unsetDeadlineDuration(): self
    {
        $this->instance->unsetDeadlineDuration();
        return $this;
    }

    /**
     * Sets status field.
     */
    public function status(?string $value): self
    {
        $this->instance->setStatus($value);
        return $this;
    }

    /**
     * Sets cancel reason field.
     */
    public function cancelReason(?string $value): self
    {
        $this->instance->setCancelReason($value);
        return $this;
    }

    /**
     * Sets created at field.
     */
    public function createdAt(?string $value): self
    {
        $this->instance->setCreatedAt($value);
        return $this;
    }

    /**
     * Sets updated at field.
     */
    public function updatedAt(?string $value): self
    {
        $this->instance->setUpdatedAt($value);
        return $this;
    }

    /**
     * Sets app id field.
     */
    public function appId(?string $value): self
    {
        $this->instance->setAppId($value);
        return $this;
    }

    /**
     * Sets location id field.
     */
    public function locationId(?string $value): self
    {
        $this->instance->setLocationId($value);
        return $this;
    }

    /**
     * Sets type field.
     */
    public function type(?string $value): self
    {
        $this->instance->setType($value);
        return $this;
    }

    /**
     * Sets qr code options field.
     */
    public function qrCodeOptions(?QrCodeOptions $value): self
    {
        $this->instance->setQrCodeOptions($value);
        return $this;
    }

    /**
     * Sets save card options field.
     */
    public function saveCardOptions(?SaveCardOptions $value): self
    {
        $this->instance->setSaveCardOptions($value);
        return $this;
    }

    /**
     * Sets signature options field.
     */
    public function signatureOptions(?SignatureOptions $value): self
    {
        $this->instance->setSignatureOptions($value);
        return $this;
    }

    /**
     * Sets confirmation options field.
     */
    public function confirmationOptions(?ConfirmationOptions $value): self
    {
        $this->instance->setConfirmationOptions($value);
        return $this;
    }

    /**
     * Sets receipt options field.
     */
    public function receiptOptions(?ReceiptOptions $value): self
    {
        $this->instance->setReceiptOptions($value);
        return $this;
    }

    /**
     * Sets data collection options field.
     */
    public function dataCollectionOptions(?DataCollectionOptions $value): self
    {
        $this->instance->setDataCollectionOptions($value);
        return $this;
    }

    /**
     * Sets select options field.
     */
    public function selectOptions(?SelectOptions $value): self
    {
        $this->instance->setSelectOptions($value);
        return $this;
    }

    /**
     * Sets device metadata field.
     */
    public function deviceMetadata(?DeviceMetadata $value): self
    {
        $this->instance->setDeviceMetadata($value);
        return $this;
    }

    /**
     * Sets await next action field.
     */
    public function awaitNextAction(?bool $value): self
    {
        $this->instance->setAwaitNextAction($value);
        return $this;
    }

    /**
     * Unsets await next action field.
     */
    public function unsetAwaitNextAction(): self
    {
        $this->instance->unsetAwaitNextAction();
        return $this;
    }

    /**
     * Sets await next action duration field.
     */
    public function awaitNextActionDuration(?string $value): self
    {
        $this->instance->setAwaitNextActionDuration($value);
        return $this;
    }

    /**
     * Unsets await next action duration field.
     */
    public function unsetAwaitNextActionDuration(): self
    {
        $this->instance->unsetAwaitNextActionDuration();
        return $this;
    }

    /**
     * Initializes a new terminal action object.
     */
    public function build(): TerminalAction
    {
        return CoreHelper::clone($this->instance);
    }
}
