<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an [ObtainToken](api-endpoint:OAuth-ObtainToken) response.
 */
class ObtainTokenResponse extends JsonSerializableType
{
    /**
     * An OAuth access token used to authorize Square API requests on behalf of the seller.
     * Include this token as a bearer token in the `Authorization` header of your API requests.
     *
     * OAuth access tokens expire in 30 days (except `short_lived` access tokens). You should call
     * `ObtainToken` and provide the returned `refresh_token` to get a new access token well before
     * the current one expires. For more information, see [OAuth API: Walkthrough](https://developer.squareup.com/docs/oauth-api/walkthrough).
     *
     * @var ?string $accessToken
     */
    #[JsonProperty('access_token')]
    private ?string $accessToken;

    /**
     * @var ?string $tokenType The type of access token. This value is always `bearer`.
     */
    #[JsonProperty('token_type')]
    private ?string $tokenType;

    /**
     * @var ?string $expiresAt The timestamp of when the `access_token` expires, in [ISO 8601](http://www.iso.org/iso/home/standards/iso8601.htm) format.
     */
    #[JsonProperty('expires_at')]
    private ?string $expiresAt;

    /**
     * @var ?string $merchantId The ID of the authorizing [merchant](entity:Merchant) (seller), which represents a business.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * __LEGACY__ The ID of merchant's subscription.
     * The ID is only present if the merchant signed up for a subscription plan during authorization.
     *
     * @var ?string $subscriptionId
     */
    #[JsonProperty('subscription_id')]
    private ?string $subscriptionId;

    /**
     * __LEGACY__ The ID of the subscription plan the merchant signed
     * up for. The ID is only present if the merchant signed up for a subscription plan during
     * authorization.
     *
     * @var ?string $planId
     */
    #[JsonProperty('plan_id')]
    private ?string $planId;

    /**
     * The OpenID token that belongs to this person. This token is only present if the
     * `OPENID` scope is included in the authorization request.
     *
     * Deprecated at version 2021-09-15. Square doesn't support OpenID or other single sign-on (SSO)
     * protocols on top of OAuth.
     *
     * @var ?string $idToken
     */
    #[JsonProperty('id_token')]
    private ?string $idToken;

    /**
     * A refresh token that can be used in an `ObtainToken` request to generate a new access token.
     *
     * With the code flow:
     * - For the `authorization_code` grant type, the refresh token is multi-use and never expires.
     * - For the `refresh_token` grant type, the response returns the same refresh token.
     *
     * With the PKCE flow:
     * - For the `authorization_code` grant type, the refresh token is single-use and expires in 90 days.
     * - For the `refresh_token` grant type, the refresh token is a new single-use refresh token that expires in 90 days.
     *
     * For more information, see [Refresh, Revoke, and Limit the Scope of OAuth Tokens](https://developer.squareup.com/docs/oauth-api/refresh-revoke-limit-scope).
     *
     * @var ?string $refreshToken
     */
    #[JsonProperty('refresh_token')]
    private ?string $refreshToken;

    /**
     * Indicates whether the access_token is short lived. If `true`, the access token expires
     * in 24 hours. If `false`, the access token expires in 30 days.
     *
     * @var ?bool $shortLived
     */
    #[JsonProperty('short_lived')]
    private ?bool $shortLived;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The timestamp of when the `refresh_token` expires, in [ISO 8601](http://www.iso.org/iso/home/standards/iso8601.htm)
     * format.
     *
     * This field is only returned for the PKCE flow.
     *
     * @var ?string $refreshTokenExpiresAt
     */
    #[JsonProperty('refresh_token_expires_at')]
    private ?string $refreshTokenExpiresAt;

    /**
     * @param array{
     *   accessToken?: ?string,
     *   tokenType?: ?string,
     *   expiresAt?: ?string,
     *   merchantId?: ?string,
     *   subscriptionId?: ?string,
     *   planId?: ?string,
     *   idToken?: ?string,
     *   refreshToken?: ?string,
     *   shortLived?: ?bool,
     *   errors?: ?array<Error>,
     *   refreshTokenExpiresAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accessToken = $values['accessToken'] ?? null;
        $this->tokenType = $values['tokenType'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->merchantId = $values['merchantId'] ?? null;
        $this->subscriptionId = $values['subscriptionId'] ?? null;
        $this->planId = $values['planId'] ?? null;
        $this->idToken = $values['idToken'] ?? null;
        $this->refreshToken = $values['refreshToken'] ?? null;
        $this->shortLived = $values['shortLived'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->refreshTokenExpiresAt = $values['refreshTokenExpiresAt'] ?? null;
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
    public function getTokenType(): ?string
    {
        return $this->tokenType;
    }

    /**
     * @param ?string $value
     */
    public function setTokenType(?string $value = null): self
    {
        $this->tokenType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    /**
     * @param ?string $value
     */
    public function setExpiresAt(?string $value = null): self
    {
        $this->expiresAt = $value;
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
     * @return ?string
     */
    public function getSubscriptionId(): ?string
    {
        return $this->subscriptionId;
    }

    /**
     * @param ?string $value
     */
    public function setSubscriptionId(?string $value = null): self
    {
        $this->subscriptionId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPlanId(): ?string
    {
        return $this->planId;
    }

    /**
     * @param ?string $value
     */
    public function setPlanId(?string $value = null): self
    {
        $this->planId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIdToken(): ?string
    {
        return $this->idToken;
    }

    /**
     * @param ?string $value
     */
    public function setIdToken(?string $value = null): self
    {
        $this->idToken = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    /**
     * @param ?string $value
     */
    public function setRefreshToken(?string $value = null): self
    {
        $this->refreshToken = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getShortLived(): ?bool
    {
        return $this->shortLived;
    }

    /**
     * @param ?bool $value
     */
    public function setShortLived(?bool $value = null): self
    {
        $this->shortLived = $value;
        return $this;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRefreshTokenExpiresAt(): ?string
    {
        return $this->refreshTokenExpiresAt;
    }

    /**
     * @param ?string $value
     */
    public function setRefreshTokenExpiresAt(?string $value = null): self
    {
        $this->refreshTokenExpiresAt = $value;
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
