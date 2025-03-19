<?php

namespace Square\OAuth\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class ObtainTokenRequest extends JsonSerializableType
{
    /**
     * The Square-issued ID of your application, which is available as the **Application ID**
     * on the **OAuth** page in the [Developer Console](https://developer.squareup.com/apps).
     *
     * Required for the code flow and PKCE flow for any grant type.
     *
     * @var string $clientId
     */
    #[JsonProperty('client_id')]
    private string $clientId;

    /**
     * The secret key for your application, which is available as the **Application secret**
     * on the **OAuth** page in the [Developer Console](https://developer.squareup.com/apps).
     *
     * Required for the code flow for any grant type. Don't confuse your client secret with your
     * personal access token.
     *
     * @var ?string $clientSecret
     */
    #[JsonProperty('client_secret')]
    private ?string $clientSecret;

    /**
     * The authorization code to exchange for an OAuth access token. This is the `code`
     * value that Square sent to your redirect URL in the authorization response.
     *
     * Required for the code flow and PKCE flow if `grant_type` is `authorization_code`.
     *
     * @var ?string $code
     */
    #[JsonProperty('code')]
    private ?string $code;

    /**
     * The redirect URL for your application, which you registered as the **Redirect URL**
     * on the **OAuth** page in the [Developer Console](https://developer.squareup.com/apps).
     *
     * Required for the code flow and PKCE flow if `grant_type` is `authorization_code` and
     * you provided the `redirect_uri` parameter in your authorization URL.
     *
     * @var ?string $redirectUri
     */
    #[JsonProperty('redirect_uri')]
    private ?string $redirectUri;

    /**
     * The method used to obtain an OAuth access token. The request must include the
     * credential that corresponds to the specified grant type. Valid values are:
     * - `authorization_code` - Requires the `code` field.
     * - `refresh_token` - Requires the `refresh_token` field.
     * - `migration_token` - LEGACY for access tokens obtained using a Square API version prior
     * to 2019-03-13. Requires the `migration_token` field.
     *
     * @var string $grantType
     */
    #[JsonProperty('grant_type')]
    private string $grantType;

    /**
     * A valid refresh token used to generate a new OAuth access token. This is a
     * refresh token that was returned in a previous `ObtainToken` response.
     *
     * Required for the code flow and PKCE flow if `grant_type` is `refresh_token`.
     *
     * @var ?string $refreshToken
     */
    #[JsonProperty('refresh_token')]
    private ?string $refreshToken;

    /**
     * __LEGACY__ A valid access token (obtained using a Square API version prior to 2019-03-13)
     * used to generate a new OAuth access token.
     *
     * Required if `grant_type` is `migration_token`. For more information, see
     * [Migrate to Using Refresh Tokens](https://developer.squareup.com/docs/oauth-api/migrate-to-refresh-tokens).
     *
     * @var ?string $migrationToken
     */
    #[JsonProperty('migration_token')]
    private ?string $migrationToken;

    /**
     * The list of permissions that are explicitly requested for the access token.
     * For example, ["MERCHANT_PROFILE_READ","PAYMENTS_READ","BANK_ACCOUNTS_READ"].
     *
     * The returned access token is limited to the permissions that are the intersection
     * of these requested permissions and those authorized by the provided `refresh_token`.
     *
     * Optional for the code flow and PKCE flow if `grant_type` is `refresh_token`.
     *
     * @var ?array<string> $scopes
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    private ?array $scopes;

    /**
     * Indicates whether the returned access token should expire in 24 hours.
     *
     * Optional for the code flow and PKCE flow for any grant type. The default value is `false`.
     *
     * @var ?bool $shortLived
     */
    #[JsonProperty('short_lived')]
    private ?bool $shortLived;

    /**
     * The secret your application generated for the authorization request used to
     * obtain the authorization code. This is the source of the `code_challenge` hash you
     * provided in your authorization URL.
     *
     * Required for the PKCE flow if `grant_type` is `authorization_code`.
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
