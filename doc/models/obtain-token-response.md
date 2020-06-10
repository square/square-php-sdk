## Obtain Token Response

### Structure

`ObtainTokenResponse`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `accessToken` | `?string` | Optional | A valid OAuth access token. OAuth access tokens are 64 bytes long.<br>Provide the access token in a header with every request to Connect API<br>endpoints. See the [Build with OAuth](https://developer.squareup.com/docs/authz/oauth/build-with-the-api) guide<br>for more information. |
| `tokenType` | `?string` | Optional | This value is always _bearer_. |
| `expiresAt` | `?string` | Optional | The date when access_token expires, in [ISO 8601](http://www.iso.org/iso/home/standards/iso8601.htm) format. |
| `merchantId` | `?string` | Optional | The ID of the authorizing merchant's business. |
| `subscriptionId` | `?string` | Optional | __LEGACY FIELD__. The ID of a subscription plan the merchant signed up<br>for. Only present if the merchant signed up for a subscription during authorization. |
| `planId` | `?string` | Optional | T__LEGACY FIELD__. The ID of the subscription plan the merchant signed<br>up for. Only present if the merchant signed up for a subscription during<br>authorization. |
| `idToken` | `?string` | Optional | Then OpenID token belonging to this this person. Only present if the<br>OPENID scope is included in the authorize request. |
| `refreshToken` | `?string` | Optional | A refresh token. OAuth refresh tokens are 64 bytes long.<br>For more information, see [OAuth access token management](https://developer.squareup.com/docs/authz/oauth/how-it-works#oauth-access-token-management). |

### Example (as JSON)

```json
{
  "access_token": "ACCESS_TOKEN",
  "token_type": "bearer",
  "expires_at": "2006-01-02T15:04:05Z",
  "merchant_id": "MERCHANT_ID",
  "refresh_token": "REFRESH_TOKEN"
}
```

