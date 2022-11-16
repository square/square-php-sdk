
# Bulk Upsert Customer Custom Attributes Response

Represents a [BulkUpsertCustomerCustomAttributes](../../doc/apis/customer-custom-attributes.md#bulk-upsert-customer-custom-attributes) response,
which contains a map of responses that each corresponds to an individual upsert request.

## Structure

`BulkUpsertCustomerCustomAttributesResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `values` | [`?array<string,BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse>`](../../doc/models/bulk-upsert-customer-custom-attributes-response-customer-custom-attribute-upsert-response.md) | Optional | A map of responses that correspond to individual upsert requests. Each response has the<br>same ID as the corresponding request and contains either a `customer_id` and `custom_attribute` or an `errors` field. | getValues(): ?array | setValues(?array values): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "values": null,
  "errors": null
}
```

