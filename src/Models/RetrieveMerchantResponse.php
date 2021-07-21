<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The response object returned by the [RetrieveMerchant]($e/Merchants/RetrieveMerchant) endpoint.
 */
class RetrieveMerchantResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Merchant|null
     */
    private $merchant;

    /**
     * Returns Errors.
     *
     * Information on errors encountered during the request.
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
     * Information on errors encountered during the request.
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
     * Returns Merchant.
     *
     * Represents a Square seller.
     */
    public function getMerchant(): ?Merchant
    {
        return $this->merchant;
    }

    /**
     * Sets Merchant.
     *
     * Represents a Square seller.
     *
     * @maps merchant
     */
    public function setMerchant(?Merchant $merchant): void
    {
        $this->merchant = $merchant;
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
            $json['errors']   = $this->errors;
        }
        if (isset($this->merchant)) {
            $json['merchant'] = $this->merchant;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
