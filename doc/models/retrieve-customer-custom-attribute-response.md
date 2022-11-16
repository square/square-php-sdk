
# Retrieve Customer Custom Attribute Response

Represents a [RetrieveCustomerCustomAttribute](../../doc/apis/customer-custom-attributes.md#retrieve-customer-custom-attribute) response.
Either `custom_attribute_definition` or `errors` is present in the response.

## Structure

`RetrieveCustomerCustomAttributeResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `customAttribute` | [`?CustomAttribute`](../../doc/models/custom-attribute.md) | Optional | A custom attribute value. Each custom attribute value has a corresponding<br>`CustomAttributeDefinition` object. | getCustomAttribute(): ?CustomAttribute | setCustomAttribute(?CustomAttribute customAttribute): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "custom_attribute": null,
  "errors": null
}
```

