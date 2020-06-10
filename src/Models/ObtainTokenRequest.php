<?php

declare(strict_types=1);

namespace Square\Models;

class ObtainTokenRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $redirectUri;

    /**
     * @var string
     */
    private $grantType;

    /**
     * @var string|null
     */
    private $refreshToken;

    /**
     * @var string|null
     */
    private $migrationToken;

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     */
    public function __construct(string $clientId, string $clientSecret, string $grantType)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->grantType = $grantType;
    }

    /**
     * Returns Client Id.
     *
     * The Square-issued ID of your application, available from the
     * [application dashboard](https://connect.squareup.com/apps).
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * Sets Client Id.
     *
     * The Square-issued ID of your application, available from the
     * [application dashboard](https://connect.squareup.com/apps).
     *
     * @required
     * @maps client_id
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * Returns Client Secret.
     *
     * The Square-issued application secret for your application, available
     * from the [application dashboard](https://connect.squareup.com/apps).
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * Sets Client Secret.
     *
     * The Square-issued application secret for your application, available
     * from the [application dashboard](https://connect.squareup.com/apps).
     *
     * @required
     * @maps client_secret
     */
    public function setClientSecret(string $clientSecret): void
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * Returns Code.
     *
     * The authorization code to exchange.
     * This is required if `grant_type` is set to `authorization_code`, to indicate that
     * the application wants to exchange an authorization code for an OAuth access token.
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Sets Code.
     *
     * The authorization code to exchange.
     * This is required if `grant_type` is set to `authorization_code`, to indicate that
     * the application wants to exchange an authorization code for an OAuth access token.
     *
     * @maps code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * Returns Redirect Uri.
     *
     * The redirect URL assigned in the [application dashboard](https://connect.squareup.com/apps).
     */
    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    /**
     * Sets Redirect Uri.
     *
     * The redirect URL assigned in the [application dashboard](https://connect.squareup.com/apps).
     *
     * @maps redirect_uri
     */
    public function setRedirectUri(?string $redirectUri): void
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * Returns Grant Type.
     *
     * Specifies the method to request an OAuth access token.
     * Valid values are: `authorization_code`, `refresh_token`, and `migration_token`
     */
    public function getGrantType(): string
    {
        return $this->grantType;
    }

    /**
     * Sets Grant Type.
     *
     * Specifies the method to request an OAuth access token.
     * Valid values are: `authorization_code`, `refresh_token`, and `migration_token`
     *
     * @required
     * @maps grant_type
     */
    public function setGrantType(string $grantType): void
    {
        $this->grantType = $grantType;
    }

    /**
     * Returns Refresh Token.
     *
     * A valid refresh token for generating a new OAuth access token.
     * A valid refresh token is required if `grant_type` is set to `refresh_token` ,
     * to indicate the application wants a replacement for an expired OAuth access token.
     */
    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    /**
     * Sets Refresh Token.
     *
     * A valid refresh token for generating a new OAuth access token.
     * A valid refresh token is required if `grant_type` is set to `refresh_token` ,
     * to indicate the application wants a replacement for an expired OAuth access token.
     *
     * @maps refresh_token
     */
    public function setRefreshToken(?string $refreshToken): void
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * Returns Migration Token.
     *
     * Legacy OAuth access token obtained using a Connect API version prior
     * to 2019-03-13. This parameter is required if `grant_type` is set to
     * `migration_token` to indicate that the application wants to get a replacement
     * OAuth access token. The response also returns a refresh token.
     * For more information, see [Migrate to Using Refresh Tokens](https://developer.squareup.
     * com/docs/authz/oauth/migration).
     */
    public function getMigrationToken(): ?string
    {
        return $this->migrationToken;
    }

    /**
     * Sets Migration Token.
     *
     * Legacy OAuth access token obtained using a Connect API version prior
     * to 2019-03-13. This parameter is required if `grant_type` is set to
     * `migration_token` to indicate that the application wants to get a replacement
     * OAuth access token. The response also returns a refresh token.
     * For more information, see [Migrate to Using Refresh Tokens](https://developer.squareup.
     * com/docs/authz/oauth/migration).
     *
     * @maps migration_token
     */
    public function setMigrationToken(?string $migrationToken): void
    {
        $this->migrationToken = $migrationToken;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['client_id']      = $this->clientId;
        $json['client_secret']  = $this->clientSecret;
        $json['code']           = $this->code;
        $json['redirect_uri']   = $this->redirectUri;
        $json['grant_type']     = $this->grantType;
        $json['refresh_token']  = $this->refreshToken;
        $json['migration_token'] = $this->migrationToken;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
