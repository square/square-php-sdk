<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * ACH-specific details about `BANK_ACCOUNT` type payments with the `transfer_type` of `ACH`.
 */
class ACHDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $routingNumber;

    /**
     * @var string|null
     */
    private $accountNumberSuffix;

    /**
     * @var string|null
     */
    private $accountType;

    /**
     * Returns Routing Number.
     *
     * The routing number for the bank account.
     */
    public function getRoutingNumber(): ?string
    {
        return $this->routingNumber;
    }

    /**
     * Sets Routing Number.
     *
     * The routing number for the bank account.
     *
     * @maps routing_number
     */
    public function setRoutingNumber(?string $routingNumber): void
    {
        $this->routingNumber = $routingNumber;
    }

    /**
     * Returns Account Number Suffix.
     *
     * The last few digits of the bank account number.
     */
    public function getAccountNumberSuffix(): ?string
    {
        return $this->accountNumberSuffix;
    }

    /**
     * Sets Account Number Suffix.
     *
     * The last few digits of the bank account number.
     *
     * @maps account_number_suffix
     */
    public function setAccountNumberSuffix(?string $accountNumberSuffix): void
    {
        $this->accountNumberSuffix = $accountNumberSuffix;
    }

    /**
     * Returns Account Type.
     *
     * The type of the bank account performing the transfer. The account type can be `CHECKING`,
     * `SAVINGS`, or `UNKNOWN`.
     */
    public function getAccountType(): ?string
    {
        return $this->accountType;
    }

    /**
     * Sets Account Type.
     *
     * The type of the bank account performing the transfer. The account type can be `CHECKING`,
     * `SAVINGS`, or `UNKNOWN`.
     *
     * @maps account_type
     */
    public function setAccountType(?string $accountType): void
    {
        $this->accountType = $accountType;
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
        if (isset($this->routingNumber)) {
            $json['routing_number']        = $this->routingNumber;
        }
        if (isset($this->accountNumberSuffix)) {
            $json['account_number_suffix'] = $this->accountNumberSuffix;
        }
        if (isset($this->accountType)) {
            $json['account_type']          = $this->accountType;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
