# O Auth

```php
$oAuthApi = $client->getOAuthApi();
```

## Class Name

`OAuthApi`

## Methods

* [Revoke Token](../../doc/apis/o-auth.md#revoke-token)
* [Obtain Token](../../doc/apis/o-auth.md#obtain-token)
* [Retrieve Token Status](../../doc/apis/o-auth.md#retrieve-token-status)


# Revoke Token

Revokes an access token generated with the OAuth flow.

If an account has more than one OAuth access token for your application, this
endpoint revokes all of them, regardless of which token you specify.

__Important:__ The `Authorization` header for this endpoint must have the
following format:

```
Authorization: Client APPLICATION_SECRET
```

Replace `APPLICATION_SECRET` with the application secret on the **OAuth**
page for your application in the Developer Dashboard.

:information_source: **Note** This endpoint does not require authentication.

```php
function revokeToken(RevokeTokenRequest $body, string $authorization): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`RevokeTokenRequest`](../../doc/models/revoke-token-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |
| `authorization` | `string` | Header, Required | Client APPLICATION_SECRET |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RevokeTokenResponse`](../../doc/models/revoke-token-response.md).

## Example Usage

```php
$body = RevokeTokenRequestBuilder::init()
    ->clientId('CLIENT_ID')
    ->accessToken('ACCESS_TOKEN')
    ->build();

$authorization = 'Client CLIENT_SECRET';

$apiResponse = $oAuthApi->revokeToken(
    $body,
    $authorization
);

if ($apiResponse->isSuccess()) {
    $revokeTokenResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Obtain Token

Returns an OAuth access token and a refresh token unless the
`short_lived` parameter is set to `true`, in which case the endpoint
returns only an access token.

The `grant_type` parameter specifies the type of OAuth request. If
`grant_type` is `authorization_code`, you must include the authorization
code you received when a seller granted you authorization. If `grant_type`
is `refresh_token`, you must provide a valid refresh token. If you're using
an old version of the Square APIs (prior to March 13, 2019), `grant_type`
can be `migration_token` and you must provide a valid migration token.

You can use the `scopes` parameter to limit the set of permissions granted
to the access token and refresh token. You can use the `short_lived` parameter
to create an access token that expires in 24 hours.

__Note:__ OAuth tokens should be encrypted and stored on a secure server.
Application clients should never interact directly with OAuth tokens.

:information_source: **Note** This endpoint does not require authentication.

```php
function obtainToken(ObtainTokenRequest $body): ApiResponse
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `body` | [`ObtainTokenRequest`](../../doc/models/obtain-token-request.md) | Body, Required | An object containing the fields to POST for the request.<br><br>See the corresponding object definition for field details. |

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`ObtainTokenResponse`](../../doc/models/obtain-token-response.md).

## Example Usage

```php
$body = ObtainTokenRequestBuilder::init(
    'APPLICATION_ID',
    'authorization_code'
)
    ->clientSecret('APPLICATION_SECRET')
    ->code('CODE_FROM_AUTHORIZE')
    ->build();

$apiResponse = $oAuthApi->obtainToken($body);

if ($apiResponse->isSuccess()) {
    $obtainTokenResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```


# Retrieve Token Status

Returns information about an [OAuth access token](https://developer.squareup.com/docs/build-basics/access-tokens#get-an-oauth-access-token) or an application’s [personal access token](https://developer.squareup.com/docs/build-basics/access-tokens#get-a-personal-access-token).

Add the access token to the Authorization header of the request.

__Important:__ The `Authorization` header you provide to this endpoint must have the following format:

```
Authorization: Bearer ACCESS_TOKEN
```

where `ACCESS_TOKEN` is a
[valid production authorization credential](https://developer.squareup.com/docs/build-basics/access-tokens).

If the access token is expired or not a valid access token, the endpoint returns an `UNAUTHORIZED` error.

```php
function retrieveTokenStatus(): ApiResponse
```

## Response Type

This method returns a `Square\Utils\ApiResponse` instance. The `getResult()` method on this instance returns the response data which is of type [`RetrieveTokenStatusResponse`](../../doc/models/retrieve-token-status-response.md).

## Example Usage

```php
$apiResponse = $oAuthApi->retrieveTokenStatus();

if ($apiResponse->isSuccess()) {
    $retrieveTokenStatusResponse = $apiResponse->getResult();
} else {
    $errors = $apiResponse->getErrors();
}

// Getting more response information
var_dump($apiResponse->getStatusCode());
var_dump($apiResponse->getHeaders());
```

