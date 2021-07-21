<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1PaymentTax
 */
class V1PaymentTax implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var V1Money|null
     */
    private $appliedMoney;

    /**
     * @var string|null
     */
    private $rate;

    /**
     * @var string|null
     */
    private $inclusionType;

    /**
     * @var string|null
     */
    private $feeId;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Name.
     *
     * The merchant-defined name of the tax.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The merchant-defined name of the tax.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Applied Money.
     */
    public function getAppliedMoney(): ?V1Money
    {
        return $this->appliedMoney;
    }

    /**
     * Sets Applied Money.
     *
     * @maps applied_money
     */
    public function setAppliedMoney(?V1Money $appliedMoney): void
    {
        $this->appliedMoney = $appliedMoney;
    }

    /**
     * Returns Rate.
     *
     * The rate of the tax, as a string representation of a decimal number. A value of 0.07 corresponds to
     * a rate of 7%.
     */
    public function getRate(): ?string
    {
        return $this->rate;
    }

    /**
     * Sets Rate.
     *
     * The rate of the tax, as a string representation of a decimal number. A value of 0.07 corresponds to
     * a rate of 7%.
     *
     * @maps rate
     */
    public function setRate(?string $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Returns Inclusion Type.
     */
    public function getInclusionType(): ?string
    {
        return $this->inclusionType;
    }

    /**
     * Sets Inclusion Type.
     *
     * @maps inclusion_type
     */
    public function setInclusionType(?string $inclusionType): void
    {
        $this->inclusionType = $inclusionType;
    }

    /**
     * Returns Fee Id.
     *
     * The ID of the tax, if available. Taxes applied in older versions of Square Register might not have
     * an ID.
     */
    public function getFeeId(): ?string
    {
        return $this->feeId;
    }

    /**
     * Sets Fee Id.
     *
     * The ID of the tax, if available. Taxes applied in older versions of Square Register might not have
     * an ID.
     *
     * @maps fee_id
     */
    public function setFeeId(?string $feeId): void
    {
        $this->feeId = $feeId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']         = $this->errors;
        }
        if (isset($this->name)) {
            $json['name']           = $this->name;
        }
        if (isset($this->appliedMoney)) {
            $json['applied_money']  = $this->appliedMoney;
        }
        if (isset($this->rate)) {
            $json['rate']           = $this->rate;
        }
        if (isset($this->inclusionType)) {
            $json['inclusion_type'] = $this->inclusionType;
        }
        if (isset($this->feeId)) {
            $json['fee_id']         = $this->feeId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
