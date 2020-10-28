
# V1 Merchant

Defines the fields that are included in the response body of
a request to the **RetrieveBusiness** endpoint.

## Structure

`V1Merchant`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The merchant account's unique identifier. | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The name associated with the merchant account. | getName(): ?string | setName(?string name): void |
| `email` | `?string` | Optional | The email address associated with the merchant account. | getEmail(): ?string | setEmail(?string email): void |
| `accountType` | [`?string (V1MerchantAccountType)`](/doc/models/v1-merchant-account-type.md) | Optional | - | getAccountType(): ?string | setAccountType(?string accountType): void |
| `accountCapabilities` | `?(string[])` | Optional | Capabilities that are enabled for the merchant's Square account. Capabilities that are not listed in this array are not enabled for the account. | getAccountCapabilities(): ?array | setAccountCapabilities(?array accountCapabilities): void |
| `countryCode` | `?string` | Optional | The country associated with the merchant account, in ISO 3166-1-alpha-2 format. | getCountryCode(): ?string | setCountryCode(?string countryCode): void |
| `languageCode` | `?string` | Optional | The language associated with the merchant account, in BCP 47 format. | getLanguageCode(): ?string | setLanguageCode(?string languageCode): void |
| `currencyCode` | `?string` | Optional | The currency associated with the merchant account, in ISO 4217 format. For example, the currency code for US dollars is USD. | getCurrencyCode(): ?string | setCurrencyCode(?string currencyCode): void |
| `businessName` | `?string` | Optional | The name of the merchant's business. | getBusinessName(): ?string | setBusinessName(?string businessName): void |
| `businessAddress` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getBusinessAddress(): ?Address | setBusinessAddress(?Address businessAddress): void |
| `businessPhone` | [`?V1PhoneNumber`](/doc/models/v1-phone-number.md) | Optional | Represents a phone number. | getBusinessPhone(): ?V1PhoneNumber | setBusinessPhone(?V1PhoneNumber businessPhone): void |
| `businessType` | [`?string (V1MerchantBusinessType)`](/doc/models/v1-merchant-business-type.md) | Optional | - | getBusinessType(): ?string | setBusinessType(?string businessType): void |
| `shippingAddress` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getShippingAddress(): ?Address | setShippingAddress(?Address shippingAddress): void |
| `locationDetails` | [`?V1MerchantLocationDetails`](/doc/models/v1-merchant-location-details.md) | Optional | Additional information for a single-location account specified by its associated business account, if it has one. | getLocationDetails(): ?V1MerchantLocationDetails | setLocationDetails(?V1MerchantLocationDetails locationDetails): void |
| `marketUrl` | `?string` | Optional | The URL of the merchant's online store. | getMarketUrl(): ?string | setMarketUrl(?string marketUrl): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "email": "email6",
  "account_type": "LOCATION",
  "account_capabilities": [
    "account_capabilities8"
  ]
}
```

