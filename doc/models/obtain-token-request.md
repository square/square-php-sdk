
# Obtain Token Request

## Structure

`ObtainTokenRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `clientId` | `string` |  | The Square-issued ID of your application, available from the<br>[application dashboard](https://connect.squareup.com/apps). | getClientId(): string | setClientId(string clientId): void |
| `clientSecret` | `string` |  | The Square-issued application secret for your application, available<br>from the [application dashboard](https://connect.squareup.com/apps). | getClientSecret(): string | setClientSecret(string clientSecret): void |
| `code` | `?string` | Optional | The authorization code to exchange.<br>This is required if `grant_type` is set to `authorization_code`, to indicate that<br>the application wants to exchange an authorization code for an OAuth access token. | getCode(): ?string | setCode(?string code): void |
| `redirectUri` | `?string` | Optional | The redirect URL assigned in the [application dashboard](https://connect.squareup.com/apps). | getRedirectUri(): ?string | setRedirectUri(?string redirectUri): void |
| `grantType` | `string` |  | Specifies the method to request an OAuth access token.<br>Valid values are: `authorization_code`, `refresh_token`, and `migration_token` | getGrantType(): string | setGrantType(string grantType): void |
| `refreshToken` | `?string` | Optional | A valid refresh token for generating a new OAuth access token.<br>A valid refresh token is required if `grant_type` is set to `refresh_token` ,<br>to indicate the application wants a replacement for an expired OAuth access token. | getRefreshToken(): ?string | setRefreshToken(?string refreshToken): void |
| `migrationToken` | `?string` | Optional | Legacy OAuth access token obtained using a Connect API version prior<br>to 2019-03-13. This parameter is required if `grant_type` is set to<br>`migration_token` to indicate that the application wants to get a replacement<br>OAuth access token. The response also returns a refresh token.<br>For more information, see [Migrate to Using Refresh Tokens](https://developer.squareup.com/docs/authz/oauth/migration). | getMigrationToken(): ?string | setMigrationToken(?string migrationToken): void |

## Example (as JSON)

```json
{
  "client_id": "APPLICATION_ID",
  "client_secret": "APPLICATION_SECRET",
  "code": "CODE_FROM_AUTHORIZE",
  "grant_type": "authorization_code"
}
```

