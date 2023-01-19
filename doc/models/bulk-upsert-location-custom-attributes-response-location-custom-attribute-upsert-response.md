
# Bulk Upsert Location Custom Attributes Response Location Custom Attribute Upsert Response

Represents a response for an individual upsert request in a [BulkUpsertLocationCustomAttributes](../../doc/apis/location-custom-attributes.md#bulk-upsert-location-custom-attributes) operation.

## Structure

`BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `locationId` | `?string` | Optional | The ID of the location associated with the custom attribute. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `customAttribute` | [`?CustomAttribute`](../../doc/models/custom-attribute.md) | Optional | A custom attribute value. Each custom attribute value has a corresponding<br>`CustomAttributeDefinition` object. | getCustomAttribute(): ?CustomAttribute | setCustomAttribute(?CustomAttribute customAttribute): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred while processing the individual request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "location_id": null,
  "custom_attribute": null,
  "errors": null
}
```

