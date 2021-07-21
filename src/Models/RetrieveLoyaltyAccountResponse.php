<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A response that includes the loyalty account.
 */
class RetrieveLoyaltyAccountResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var LoyaltyAccount|null
     */
    private $loyaltyAccount;

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
     * Returns Loyalty Account.
     *
     * Describes a loyalty account. For more information, see
     * [Manage Loyalty Accounts Using the Loyalty API](https://developer.squareup.com/docs/loyalty-
     * api/overview).
     */
    public function getLoyaltyAccount(): ?LoyaltyAccount
    {
        return $this->loyaltyAccount;
    }

    /**
     * Sets Loyalty Account.
     *
     * Describes a loyalty account. For more information, see
     * [Manage Loyalty Accounts Using the Loyalty API](https://developer.squareup.com/docs/loyalty-
     * api/overview).
     *
     * @maps loyalty_account
     */
    public function setLoyaltyAccount(?LoyaltyAccount $loyaltyAccount): void
    {
        $this->loyaltyAccount = $loyaltyAccount;
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
            $json['errors']          = $this->errors;
        }
        if (isset($this->loyaltyAccount)) {
            $json['loyalty_account'] = $this->loyaltyAccount;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
