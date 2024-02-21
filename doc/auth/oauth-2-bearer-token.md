
# OAuth 2 Bearer token



Documentation for accessing and setting credentials for global.

## Auth Credentials

| Name | Type | Description | Setter | Getter |
|  --- | --- | --- | --- | --- |
| AccessToken | `string` | The OAuth 2.0 Access Token to use for API requests. | `accessToken` | `getAccessToken()` |



**Note:** Auth credentials can be set using `BearerAuthCredentialsBuilder::init()` in `bearerAuthCredentials` method in the client builder and accessed through `getBearerAuthCredentials` method in the client instance.

## Usage Example

### Client Initialization

You must provide credentials in the client as shown in the following code snippet.

```php
$client = SquareClientBuilder::init()
    ->bearerAuthCredentials(
        BearerAuthCredentialsBuilder::init(
            'AccessToken'
        )
    )
    ->build();
```


