<?php

namespace Square\OAuth\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class ObtainTokenRequest extends JsonSerializableType
{
    /**
     * The Square-issued ID of your application, which is available on the **OAuth** page in the
     * [Developer Dashboard](https://developer.squareup.com/apps).
     *
     * @var string $clientId
     */
    #[JsonProperty('client_id')]
    private string $clientId;

    /**
     * The Square-issued application secret for your application, which is available on the **OAuth** page
     * in the [Developer Dashboard](https://developer.squareup.com/apps). This parameter is only required when
     * you're not using the [OAuth PKCE (Proof Key for Code Exchange) flow](https://developer.squareup.com/docs/oauth-api/overview#pkce-flow).
     * The PKCE flow requires a `code_verifier` instead of a `client_secret` when `grant_type` is set to `authorization_code`.
     * If `grant_type` is set to `refresh_token` and the `refresh_token` is obtained uaing PKCE, the PKCE flow only requires `client_id`,
     * `grant_type`, and `refresh_token`.
     *
     * @var ?string $clientSecret
     */
    #[JsonProperty('client_secret')]
    private ?string $clientSecret;

    /**
     * The authorization code to exchange.
     * This code is required if `grant_type` is set to `authorization_code` to indicate that
     * the application wants to exchange an authorization code for an OAuth access token.
     *
     * @var ?string $code
     */
    #[JsonProperty('code')]
    private ?string $code;

    /**
     * @var ?string $redirectUri The redirect URL assigned on the **OAuth** page for your application in the [Developer Dashboard](https://developer.squareup.com/apps).
     */
    #[JsonProperty('redirect_uri')]
    private ?string $redirectUri;

    /**
     * Specifies the method to request an OAuth access token.
     * Valid values are `authorization_code`, `refresh_token`, and `migration_token`.
     *
     * @var string $grantType
     */
    #[JsonProperty('grant_type')]
    private string $grantType;

    /**
     * A valid refresh token for generating a new OAuth access token.
     *
     * A valid refresh token is required if `grant_type` is set to `refresh_token`
     * to indicate that the application wants a replacement for an expired OAuth access token.
     *
     * @var ?string $refreshToken
     */
    #[JsonProperty('refresh_token')]
    private ?string $refreshToken;

    /**
     * A legacy OAuth access token obtained using a Connect API version prior
     * to 2019-03-13. This parameter is required if `grant_type` is set to
     * `migration_token` to indicate that the application wants to get a replacement
     * OAuth access token. The response also returns a refresh token.
     * For more information, see [Migrate to Using Refresh Tokens](https://developer.squareup.com/docs/oauth-api/migrate-to-refresh-tokens).
     *
     * @var ?string $migrationToken
     */
    #[JsonProperty('migration_token')]
    private ?string $migrationToken;

    /**
     * A JSON list of strings representing the permissions that the application is requesting.
     * For example, "`["MERCHANT_PROFILE_READ","PAYMENTS_READ","BANK_ACCOUNTS_READ"]`".
     *
     * The access token returned in the response is granted the permissions
     * that comprise the intersection between the requested list of permissions and those
     * that belong to the provided refresh token.
     *
     * @var ?array<string> $scopes
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    private ?array $scopes;

    /**
     * A Boolean indicating a request for a short-lived access token.
     *
     * The short-lived access token returned in the response expires in 24 hours.
     *
     * @var ?bool $shortLived
     */
    #[JsonProperty('short_lived')]
    private ?bool $shortLived;

    /**
     * Must be provided when using the PKCE OAuth flow if `grant_type` is set to `authorization_code`. The `code_verifier` is used to verify against the
     * `code_challenge` associated with the `authorization_code`.
     *
     * @var ?string $codeVerifier
     */
    #[JsonProperty('code_verifier')]
    private ?string $codeVerifier;

    /**
     * @param array{
     *   clientId: string,
     *   grantType: string,
     *   clientSecret?: ?string,
     *   code?: ?string,
     *   redirectUri?: ?string,
     *   refreshToken?: ?string,
     *   migrationToken?: ?string,
     *   scopes?: ?array<string>,
     *   shortLived?: ?bool,
     *   codeVerifier?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clientId = $values['clientId'];
        $this->clientSecret = $values['clientSecret'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->redirectUri = $values['redirectUri'] ?? null;
        $this->grantType = $values['grantType'];
        $this->refreshToken = $values['refreshToken'] ?? null;
        $this->migrationToken = $values['migrationToken'] ?? null;
        $this->scopes = $values['scopes'] ?? null;
        $this->shortLived = $values['shortLived'] ?? null;
        $this->codeVerifier = $values['codeVerifier'] ?? null;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $value
     */
    public function setClientId(string $value): self
    {
        $this->clientId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }

    /**
     * @param ?string $value
     */
    public function setClientSecret(?string $value = null): self
    {
        $this->clientSecret = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param ?string $value
     */
    public function setCode(?string $value = null): self
    {
        $this->code = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    /**
     * @param ?string $value
     */
    public function setRedirectUri(?string $value = null): self
    {
        $this->redirectUri = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getGrantType(): string
    {
        return $this->grantType;
    }

    /**
     * @param string $value
     */
    public function setGrantType(string $value): self
    {
        $this->grantType = $value;
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
     * @return ?string
     */
    public function getMigrationToken(): ?string
    {
        return $this->migrationToken;
    }

    /**
     * @param ?string $value
     */
    public function setMigrationToken(?string $value = null): self
    {
        $this->migrationToken = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getScopes(): ?array
    {
        return $this->scopes;
    }

    /**
     * @param ?array<string> $value
     */
    public function setScopes(?array $value = null): self
    {
        $this->scopes = $value;
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
     * @return ?string
     */
    public function getCodeVerifier(): ?string
    {
        return $this->codeVerifier;
    }

    /**
     * @param ?string $value
     */
    public function setCodeVerifier(?string $value = null): self
    {
        $this->codeVerifier = $value;
        return $this;
    }
}
