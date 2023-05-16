
# Bulk Delete Merchant Custom Attributes Response

Represents a [BulkDeleteMerchantCustomAttributes](../../doc/apis/merchant-custom-attributes.md#bulk-delete-merchant-custom-attributes) response,
which contains a map of responses that each corresponds to an individual delete request.

## Structure

`BulkDeleteMerchantCustomAttributesResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `values` | [`array<string,BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse>`](../../doc/models/bulk-delete-merchant-custom-attributes-response-merchant-custom-attribute-delete-response.md) | Required | A map of responses that correspond to individual delete requests. Each response has the<br>same key as the corresponding request. | getValues(): array | setValues(array values): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "values": {
    "id1": {
      "errors": [],
      "merchant_id": "DM7VKY8Q63GNP"
    },
    "id2": {
      "errors": [],
      "merchant_id": "DM7VKY8Q63GNP"
    }
  },
  "errors": [
    {
      "category": "AUTHENTICATION_ERROR",
      "code": "REFUND_ALREADY_PENDING",
      "detail": "detail1",
      "field": "field9"
    },
    {
      "category": "INVALID_REQUEST_ERROR",
      "code": "PAYMENT_NOT_REFUNDABLE",
      "detail": "detail2",
      "field": "field0"
    },
    {
      "category": "RATE_LIMIT_ERROR",
      "code": "REFUND_DECLINED",
      "detail": "detail3",
      "field": "field1"
    }
  ]
}
```

