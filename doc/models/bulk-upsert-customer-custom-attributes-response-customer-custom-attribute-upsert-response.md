
# Bulk Upsert Customer Custom Attributes Response Customer Custom Attribute Upsert Response

Represents a response for an individual upsert request in a [BulkUpsertCustomerCustomAttributes](../../doc/apis/customer-custom-attributes.md#bulk-upsert-customer-custom-attributes) operation.

## Structure

`BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `customerId` | `?string` | Optional | The ID of the customer profile associated with the custom attribute. | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `customAttribute` | [`?CustomAttribute`](../../doc/models/custom-attribute.md) | Optional | A custom attribute value. Each custom attribute value has a corresponding<br>`CustomAttributeDefinition` object. | getCustomAttribute(): ?CustomAttribute | setCustomAttribute(?CustomAttribute customAttribute): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred while processing the individual request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "customer_id": null,
  "custom_attribute": null,
  "errors": null
}
```

