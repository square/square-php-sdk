<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a refund processed for a Square transaction.
 */
class Refund extends JsonSerializableType
{
    /**
     * @var string $id The refund's unique ID.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $locationId The ID of the refund's associated location.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @var ?string $transactionId The ID of the transaction that the refunded tender is part of.
     */
    #[JsonProperty('transaction_id')]
    private ?string $transactionId;

    /**
     * @var ?string $tenderId The ID of the refunded tender.
     */
    #[JsonProperty('tender_id')]
    private ?string $tenderId;

    /**
     * @var ?string $createdAt The timestamp for when the refund was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var string $reason The reason for the refund being issued.
     */
    #[JsonProperty('reason')]
    private string $reason;

    /**
     * @var Money $amountMoney The amount of money refunded to the buyer.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * The current status of the refund (`PENDING`, `APPROVED`, `REJECTED`,
     * or `FAILED`).
     * See [RefundStatus](#type-refundstatus) for possible values
     *
     * @var value-of<RefundStatus> $status
     */
    #[JsonProperty('status')]
    private string $status;

    /**
     * @var ?Money $processingFeeMoney The amount of Square processing fee money refunded to the *merchant*.
     */
    #[JsonProperty('processing_fee_money')]
    private ?Money $processingFeeMoney;

    /**
     * Additional recipients (other than the merchant) receiving a portion of this refund.
     * For example, fees assessed on a refund of a purchase by a third party integration.
     *
     * @var ?array<AdditionalRecipient> $additionalRecipients
     */
    #[JsonProperty('additional_recipients'), ArrayType([AdditionalRecipient::class])]
    private ?array $additionalRecipients;

    /**
     * @param array{
     *   id: string,
     *   locationId: string,
     *   reason: string,
     *   amountMoney: Money,
     *   status: value-of<RefundStatus>,
     *   transactionId?: ?string,
     *   tenderId?: ?string,
     *   createdAt?: ?string,
     *   processingFeeMoney?: ?Money,
     *   additionalRecipients?: ?array<AdditionalRecipient>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->locationId = $values['locationId'];
        $this->transactionId = $values['transactionId'] ?? null;
        $this->tenderId = $values['tenderId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->reason = $values['reason'];
        $this->amountMoney = $values['amountMoney'];
        $this->status = $values['status'];
        $this->processingFeeMoney = $values['processingFeeMoney'] ?? null;
        $this->additionalRecipients = $values['additionalRecipients'] ?? null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * @param ?string $value
     */
    public function setTransactionId(?string $value = null): self
    {
        $this->transactionId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTenderId(): ?string
    {
        return $this->tenderId;
    }

    /**
     * @param ?string $value
     */
    public function setTenderId(?string $value = null): self
    {
        $this->tenderId = $value;
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
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $value
     */
    public function setReason(string $value): self
    {
        $this->reason = $value;
        return $this;
    }

    /**
     * @return Money
     */
    public function getAmountMoney(): Money
    {
        return $this->amountMoney;
    }

    /**
     * @param Money $value
     */
    public function setAmountMoney(Money $value): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return value-of<RefundStatus>
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param value-of<RefundStatus> $value
     */
    public function setStatus(string $value): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getProcessingFeeMoney(): ?Money
    {
        return $this->processingFeeMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setProcessingFeeMoney(?Money $value = null): self
    {
        $this->processingFeeMoney = $value;
        return $this;
    }

    /**
     * @return ?array<AdditionalRecipient>
     */
    public function getAdditionalRecipients(): ?array
    {
        return $this->additionalRecipients;
    }

    /**
     * @param ?array<AdditionalRecipient> $value
     */
    public function setAdditionalRecipients(?array $value = null): self
    {
        $this->additionalRecipients = $value;
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
