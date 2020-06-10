<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1BankAccount
 */
class V1BankAccount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var string|null
     */
    private $bankName;

    /**
     * @var string|null
     */
    private $name;

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
    private $currencyCode;

    /**
     * @var string|null
     */
    private $type;

    /**
     * Returns Id.
     *
     * The bank account's Square-issued ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The bank account's Square-issued ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Merchant Id.
     *
     * The Square-issued ID of the merchant associated with the bank account.
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * Sets Merchant Id.
     *
     * The Square-issued ID of the merchant associated with the bank account.
     *
     * @maps merchant_id
     */
    public function setMerchantId(?string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * Returns Bank Name.
     *
     * The name of the bank that manages the account.
     */
    public function getBankName(): ?string
    {
        return $this->bankName;
    }

    /**
     * Sets Bank Name.
     *
     * The name of the bank that manages the account.
     *
     * @maps bank_name
     */
    public function setBankName(?string $bankName): void
    {
        $this->bankName = $bankName;
    }

    /**
     * Returns Name.
     *
     * The name associated with the bank account.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name associated with the bank account.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Routing Number.
     *
     * The bank account's routing number.
     */
    public function getRoutingNumber(): ?string
    {
        return $this->routingNumber;
    }

    /**
     * Sets Routing Number.
     *
     * The bank account's routing number.
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
     * Returns Currency Code.
     *
     * The currency code of the currency associated with the bank account, in ISO 4217 format. For example,
     * the currency code for US dollars is USD.
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * Sets Currency Code.
     *
     * The currency code of the currency associated with the bank account, in ISO 4217 format. For example,
     * the currency code for US dollars is USD.
     *
     * @maps currency_code
     */
    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * Returns Type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                  = $this->id;
        $json['merchant_id']         = $this->merchantId;
        $json['bank_name']           = $this->bankName;
        $json['name']                = $this->name;
        $json['routing_number']      = $this->routingNumber;
        $json['account_number_suffix'] = $this->accountNumberSuffix;
        $json['currency_code']       = $this->currencyCode;
        $json['type']                = $this->type;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
