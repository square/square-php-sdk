<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * ACH-specific details about `BANK_ACCOUNT` type payments with the `transfer_type` of `ACH`.
 */
class AchDetails extends JsonSerializableType
{
    /**
     * @var ?string $routingNumber The routing number for the bank account.
     */
    #[JsonProperty('routing_number')]
    private ?string $routingNumber;

    /**
     * @var ?string $accountNumberSuffix The last few digits of the bank account number.
     */
    #[JsonProperty('account_number_suffix')]
    private ?string $accountNumberSuffix;

    /**
     * The type of the bank account performing the transfer. The account type can be `CHECKING`,
     * `SAVINGS`, or `UNKNOWN`.
     *
     * @var ?string $accountType
     */
    #[JsonProperty('account_type')]
    private ?string $accountType;

    /**
     * @param array{
     *   routingNumber?: ?string,
     *   accountNumberSuffix?: ?string,
     *   accountType?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->routingNumber = $values['routingNumber'] ?? null;
        $this->accountNumberSuffix = $values['accountNumberSuffix'] ?? null;
        $this->accountType = $values['accountType'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getRoutingNumber(): ?string
    {
        return $this->routingNumber;
    }

    /**
     * @param ?string $value
     */
    public function setRoutingNumber(?string $value = null): self
    {
        $this->routingNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAccountNumberSuffix(): ?string
    {
        return $this->accountNumberSuffix;
    }

    /**
     * @param ?string $value
     */
    public function setAccountNumberSuffix(?string $value = null): self
    {
        $this->accountNumberSuffix = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAccountType(): ?string
    {
        return $this->accountType;
    }

    /**
     * @param ?string $value
     */
    public function setAccountType(?string $value = null): self
    {
        $this->accountType = $value;
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
