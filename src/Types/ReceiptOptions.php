<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes receipt action fields.
 */
class ReceiptOptions extends JsonSerializableType
{
    /**
     * @var string $paymentId The reference to the Square payment ID for the receipt.
     */
    #[JsonProperty('payment_id')]
    private string $paymentId;

    /**
     * Instructs the device to print the receipt without displaying the receipt selection screen.
     * Requires `printer_enabled` set to true.
     * Defaults to false.
     *
     * @var ?bool $printOnly
     */
    #[JsonProperty('print_only')]
    private ?bool $printOnly;

    /**
     * Identify the receipt as a reprint rather than an original receipt.
     * Defaults to false.
     *
     * @var ?bool $isDuplicate
     */
    #[JsonProperty('is_duplicate')]
    private ?bool $isDuplicate;

    /**
     * @param array{
     *   paymentId: string,
     *   printOnly?: ?bool,
     *   isDuplicate?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->paymentId = $values['paymentId'];
        $this->printOnly = $values['printOnly'] ?? null;
        $this->isDuplicate = $values['isDuplicate'] ?? null;
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @param string $value
     */
    public function setPaymentId(string $value): self
    {
        $this->paymentId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getPrintOnly(): ?bool
    {
        return $this->printOnly;
    }

    /**
     * @param ?bool $value
     */
    public function setPrintOnly(?bool $value = null): self
    {
        $this->printOnly = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsDuplicate(): ?bool
    {
        return $this->isDuplicate;
    }

    /**
     * @param ?bool $value
     */
    public function setIsDuplicate(?bool $value = null): self
    {
        $this->isDuplicate = $value;
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
