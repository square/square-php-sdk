<?php

declare(strict_types=1);

namespace Square\Models;

class RevokeTokenRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $clientId;

    /**
     * @var string|null
     */
    private $accessToken;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var bool|null
     */
    private $revokeOnlyAccessToken;

    /**
     * Returns Client Id.
     *
     * The Square-issued ID for your application, available from
     * the OAuth page for your application on the Developer Dashboard.
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * Sets Client Id.
     *
     * The Square-issued ID for your application, available from
     * the OAuth page for your application on the Developer Dashboard.
     *
     * @maps client_id
     */
    public function setClientId(?string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * Returns Access Token.
     *
     * The access token of the merchant whose token you want to revoke.
     * Do not provide a value for merchant_id if you provide this parameter.
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * Sets Access Token.
     *
     * The access token of the merchant whose token you want to revoke.
     * Do not provide a value for merchant_id if you provide this parameter.
     *
     * @maps access_token
     */
    public function setAccessToken(?string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Returns Merchant Id.
     *
     * The ID of the merchant whose token you want to revoke.
     * Do not provide a value for access_token if you provide this parameter.
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * Sets Merchant Id.
     *
     * The ID of the merchant whose token you want to revoke.
     * Do not provide a value for access_token if you provide this parameter.
     *
     * @maps merchant_id
     */
    public function setMerchantId(?string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * Returns Revoke Only Access Token.
     *
     * If `true`, terminate the given single access token, but do not
     * terminate the entire authorization.
     * Default: `false`
     */
    public function getRevokeOnlyAccessToken(): ?bool
    {
        return $this->revokeOnlyAccessToken;
    }

    /**
     * Sets Revoke Only Access Token.
     *
     * If `true`, terminate the given single access token, but do not
     * terminate the entire authorization.
     * Default: `false`
     *
     * @maps revoke_only_access_token
     */
    public function setRevokeOnlyAccessToken(?bool $revokeOnlyAccessToken): void
    {
        $this->revokeOnlyAccessToken = $revokeOnlyAccessToken;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->clientId)) {
            $json['client_id']                = $this->clientId;
        }
        if (isset($this->accessToken)) {
            $json['access_token']             = $this->accessToken;
        }
        if (isset($this->merchantId)) {
            $json['merchant_id']              = $this->merchantId;
        }
        if (isset($this->revokeOnlyAccessToken)) {
            $json['revoke_only_access_token'] = $this->revokeOnlyAccessToken;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
