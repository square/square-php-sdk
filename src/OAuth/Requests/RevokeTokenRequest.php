<?php

namespace Square\OAuth\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class RevokeTokenRequest extends JsonSerializableType
{
    /**
     * The Square-issued ID for your application, which is available on the **OAuth** page in the
     * [Developer Dashboard](https://developer.squareup.com/apps).
     *
     * @var ?string $clientId
     */
    #[JsonProperty('client_id')]
    private ?string $clientId;

    /**
     * The access token of the merchant whose token you want to revoke.
     * Do not provide a value for `merchant_id` if you provide this parameter.
     *
     * @var ?string $accessToken
     */
    #[JsonProperty('access_token')]
    private ?string $accessToken;

    /**
     * The ID of the merchant whose token you want to revoke.
     * Do not provide a value for `access_token` if you provide this parameter.
     *
     * @var ?string $merchantId
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * If `true`, terminate the given single access token, but do not
     * terminate the entire authorization.
     * Default: `false`
     *
     * @var ?bool $revokeOnlyAccessToken
     */
    #[JsonProperty('revoke_only_access_token')]
    private ?bool $revokeOnlyAccessToken;

    /**
     * @param array{
     *   clientId?: ?string,
     *   accessToken?: ?string,
     *   merchantId?: ?string,
     *   revokeOnlyAccessToken?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clientId = $values['clientId'] ?? null;
        $this->accessToken = $values['accessToken'] ?? null;
        $this->merchantId = $values['merchantId'] ?? null;
        $this->revokeOnlyAccessToken = $values['revokeOnlyAccessToken'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @param ?string $value
     */
    public function setClientId(?string $value = null): self
    {
        $this->clientId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param ?string $value
     */
    public function setAccessToken(?string $value = null): self
    {
        $this->accessToken = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @param ?string $value
     */
    public function setMerchantId(?string $value = null): self
    {
        $this->merchantId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRevokeOnlyAccessToken(): ?bool
    {
        return $this->revokeOnlyAccessToken;
    }

    /**
     * @param ?bool $value
     */
    public function setRevokeOnlyAccessToken(?bool $value = null): self
    {
        $this->revokeOnlyAccessToken = $value;
        return $this;
    }
}
