<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes a payment request reminder (automatic notification) that Square sends
 * to the customer. You configure a reminder relative to the payment request
 * `due_date`.
 */
class InvoicePaymentReminder extends JsonSerializableType
{
    /**
     * A Square-assigned ID that uniquely identifies the reminder within the
     * `InvoicePaymentRequest`.
     *
     * @var ?string $uid
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The number of days before (a negative number) or after (a positive number)
     * the payment request `due_date` when the reminder is sent. For example, -3 indicates that
     * the reminder should be sent 3 days before the payment request `due_date`.
     *
     * @var ?int $relativeScheduledDays
     */
    #[JsonProperty('relative_scheduled_days')]
    private ?int $relativeScheduledDays;

    /**
     * @var ?string $message The reminder message.
     */
    #[JsonProperty('message')]
    private ?string $message;

    /**
     * The status of the reminder.
     * See [InvoicePaymentReminderStatus](#type-invoicepaymentreminderstatus) for possible values
     *
     * @var ?value-of<InvoicePaymentReminderStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $sentAt If sent, the timestamp when the reminder was sent, in RFC 3339 format.
     */
    #[JsonProperty('sent_at')]
    private ?string $sentAt;

    /**
     * @param array{
     *   uid?: ?string,
     *   relativeScheduledDays?: ?int,
     *   message?: ?string,
     *   status?: ?value-of<InvoicePaymentReminderStatus>,
     *   sentAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->relativeScheduledDays = $values['relativeScheduledDays'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->sentAt = $values['sentAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getRelativeScheduledDays(): ?int
    {
        return $this->relativeScheduledDays;
    }

    /**
     * @param ?int $value
     */
    public function setRelativeScheduledDays(?int $value = null): self
    {
        $this->relativeScheduledDays = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param ?string $value
     */
    public function setMessage(?string $value = null): self
    {
        $this->message = $value;
        return $this;
    }

    /**
     * @return ?value-of<InvoicePaymentReminderStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<InvoicePaymentReminderStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSentAt(): ?string
    {
        return $this->sentAt;
    }

    /**
     * @param ?string $value
     */
    public function setSentAt(?string $value = null): self
    {
        $this->sentAt = $value;
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
