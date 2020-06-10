## V1 Merchant

Defines the fields that are included in the response body of
a request to the **RetrieveBusiness** endpoint.

### Structure

`V1Merchant`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `?string` | Optional | The merchant account's unique identifier. |
| `name` | `?string` | Optional | The name associated with the merchant account. |
| `email` | `?string` | Optional | The email address associated with the merchant account. |
| `accountType` | [`?string (V1MerchantAccountType)`](/doc/models/v1-merchant-account-type.md) | Optional | -  |
| `accountCapabilities` | `?(string[])` | Optional | Capabilities that are enabled for the merchant's Square account. Capabilities that are not listed in this array are not enabled for the account. |
| `countryCode` | `?string` | Optional | The country associated with the merchant account, in ISO 3166-1-alpha-2 format. |
| `languageCode` | `?string` | Optional | The language associated with the merchant account, in BCP 47 format. |
| `currencyCode` | `?string` | Optional | The currency associated with the merchant account, in ISO 4217 format. For example, the currency code for US dollars is USD. |
| `businessName` | `?string` | Optional | The name of the merchant's business. |
| `businessAddress` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. |
| `businessPhone` | [`?V1PhoneNumber`](/doc/models/v1-phone-number.md) | Optional | Represents a phone number. |
| `businessType` | [`?string (V1MerchantBusinessType)`](/doc/models/v1-merchant-business-type.md) | Optional | -  |
| `shippingAddress` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. |
| `locationDetails` | [`?V1MerchantLocationDetails`](/doc/models/v1-merchant-location-details.md) | Optional | Additional information for a single-location account specified by its associated business account, if it has one. |
| `marketUrl` | `?string` | Optional | The URL of the merchant's online store. |

### Example (as JSON)

```json
{
  "id": null,
  "name": null,
  "email": null,
  "account_type": null,
  "account_capabilities": null,
  "country_code": null,
  "language_code": null,
  "currency_code": null,
  "business_name": null,
  "business_address": null,
  "business_phone": null,
  "business_type": null,
  "shipping_address": null,
  "location_details": null,
  "market_url": null
}
```

