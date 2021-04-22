
# Retrieve Merchant Response

The response object returned by the [RetrieveMerchant](/doc/apis/merchants.md#retrieve-merchant) endpoint.

## Structure

`RetrieveMerchantResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](/doc/models/error.md) | Optional | Information on errors encountered during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `merchant` | [`?Merchant`](/doc/models/merchant.md) | Optional | Represents a Square seller. | getMerchant(): ?Merchant | setMerchant(?Merchant merchant): void |

## Example (as JSON)

```json
{
  "merchant": {
    "business_name": "Apple A Day",
    "country": "US",
    "currency": "USD",
    "id": "DM7VKY8Q63GNP",
    "language_code": "en-US",
    "main_location_id": "9A65CGC72ZQG1",
    "status": "ACTIVE"
  }
}
```

