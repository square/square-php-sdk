<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the details of a tender with `type` `BANK_ACCOUNT`.
 *
 * See [BankAccountPaymentDetails](entity:BankAccountPaymentDetails)
 * for more exposed details of a bank account payment.
 */
class TenderBankAccountDetails extends JsonSerializableType
{
    /**
     * The bank account payment's current state.
     *
     * See [TenderBankAccountPaymentDetailsStatus](entity:TenderBankAccountDetailsStatus) for possible values.
     * See [TenderBankAccountDetailsStatus](#type-tenderbankaccountdetailsstatus) for possible values
     *
     * @var ?value-of<TenderBankAccountDetailsStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @param array{
     *   status?: ?value-of<TenderBankAccountDetailsStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return ?value-of<TenderBankAccountDetailsStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TenderBankAccountDetailsStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
