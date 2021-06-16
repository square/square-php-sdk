# O Auth

```php
$oAuthApi = $client->getOAuthApi();
```

## Class Name

`OAuthApi`

## Methods

* [Renew Token](/doc/apis/o-auth.md#renew-token)
* [Revoke Token](/doc/apis/o-auth.md#revoke-token)
* [Obtain Token](/doc/apis/o-auth.md#obtain-token)


# Renew Token

**This endpoint is deprecated.**

`RenewToken` is deprecated. For information about refreshing OAuth access tokens, see
[Migrate from Renew to Refresh OAuth Tokens](https://developer.squareup.com/docs/oauth-api/migrate-to-refresh-tokens).

Renews an OAuth access token before it expires.

OAuth access tokens besides your application's personal access token expire after __30 days__.
You can also renew expired tokens within __15 days__ of their expiration.
You cannot renew an access token that has been expired for more than 15 days.
Instead, the associated user must re-complete the OAuth flow from the beginning.

__Important:__ The `Authorization` header for this endpoint must have the
following format:

```
Authorization: Client APPLICATION_SECRET
```

Replace `APPLICATION_SECRET` with the application secret on the Credentials
page in the [developer dashboard](https://developer.squareup.com/apps).

:information_source: **Note** This endpoint does not require authentication.

```php
function renewToken(string $clientId, RenewTokenRequest $body, string $authorization): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `clientId` | `string` | Template, Required | Your application ID, available from the [developer dashboard](https://developer.squareup.com/apps). |
| `body` | [`RenewTokenRequest`](/doc/models/renew-token-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |
| `authorization` | `string` | Header, Required | Client APPLICATION_SECRET |

## Response Type

[`RenewTokenResponse`](/doc/models/renew-token-response.md)

## Example Usage

```php
$clientId = 'client_id8';
$body = new Models\RenewTokenRequest;
$body->setAccessToken('ACCESS_TOKEN');
$authorization = 'Client CLIENT_SECRET';

$apiResponse = $oAuthApi->renewToken($clientId, $body, $authorization);

if ($apiResponse->isSuccess()) {
    $renewTokenResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Revoke Token

Revokes an access token generated with the OAuth flow.

If an account has more than one OAuth access token for your application, this
endpoint revokes all of them, regardless of which token you specify. When an
OAuth access token is revoked, all of the active subscriptions associated
with that OAuth token are canceled immediately.

__Important:__ The `Authorization` header for this endpoint must have the
following format:

```
Authorization: Client APPLICATION_SECRET
```

Replace `APPLICATION_SECRET` with the application secret on the OAuth
page in the [developer dashboard](https://developer.squareup.com/apps).

:information_source: **Note** This endpoint does not require authentication.

```php
function revokeToken(RevokeTokenRequest $body, string $authorization): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`RevokeTokenRequest`](/doc/models/revoke-token-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |
| `authorization` | `string` | Header, Required | Client APPLICATION_SECRET |

## Response Type

[`RevokeTokenResponse`](/doc/models/revoke-token-response.md)

## Example Usage

```php
$body = new Models\RevokeTokenRequest;
$body->setClientId('CLIENT_ID');
$body->setAccessToken('ACCESS_TOKEN');
$body->setMerchantId('merchant_id6');
$body->setRevokeOnlyAccessToken(false);
$authorization = 'Client CLIENT_SECRET';

$apiResponse = $oAuthApi->revokeToken($body, $authorization);

if ($apiResponse->isSuccess()) {
    $revokeTokenResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```


# Obtain Token

Returns an OAuth access token.

The endpoint supports distinct methods of obtaining OAuth access tokens.
Applications specify a method by adding the `grant_type` parameter
in the request and also provide relevant information.

__Note:__ Regardless of the method application specified,
the endpoint always returns two items; an OAuth access token and
a refresh token in the response.

__OAuth tokens should only live on secure servers. Application clients
should never interact directly with OAuth tokens__.

:information_source: **Note** This endpoint does not require authentication.

```php
function obtainToken(ObtainTokenRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`ObtainTokenRequest`](/doc/models/obtain-token-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

[`ObtainTokenResponse`](/doc/models/obtain-token-response.md)

## Example Usage

```php
$body_clientId = 'APPLICATION_ID';
$body_clientSecret = 'APPLICATION_SECRET';
$body_grantType = 'authorization_code';
$body = new Models\ObtainTokenRequest(
    $body_clientId,
    $body_clientSecret,
    $body_grantType
);
$body->setCode('CODE_FROM_AUTHORIZE');
$body->setRedirectUri('redirect_uri4');
$body->setRefreshToken('refresh_token6');
$body->setMigrationToken('migration_token4');
$body->setScopes(['scopes6', 'scopes7', 'scopes8']);

$apiResponse = $oAuthApi->obtainToken($body);

if ($apiResponse->isSuccess()) {
    $obtainTokenResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Get more response info...
// $statusCode = $apiResponse->getStatusCode();
// $headers = $apiResponse->getHeaders();
```

