
# Create Mobile Authorization Code Response

Defines the fields that are included in the response body of
a request to the `CreateMobileAuthorizationCode` endpoint.

## Structure

`CreateMobileAuthorizationCodeResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `authorizationCode` | `?string` | Optional | The generated authorization code that connects a mobile application instance<br>to a Square account.<br>**Constraints**: *Maximum Length*: `191` | getAuthorizationCode(): ?string | setAuthorizationCode(?string authorizationCode): void |
| `expiresAt` | `?string` | Optional | The timestamp when `authorization_code` expires, in<br>[RFC 3339](https://tools.ietf.org/html/rfc3339) format (for example, "2016-09-04T23:59:33.123Z").<br>**Constraints**: *Minimum Length*: `20`, *Maximum Length*: `48` | getExpiresAt(): ?string | setExpiresAt(?string expiresAt): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "authorization_code": "YOUR_MOBILE_AUTHORIZATION_CODE",
  "expires_at": "2019-01-10T19:42:08Z",
  "errors": [
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    },
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    }
  ]
}
```

