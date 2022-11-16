
# Booking Custom Attribute Upsert Response

Represents a response for an individual upsert request in a [BulkUpsertBookingCustomAttributes](../../doc/apis/booking-custom-attributes.md#bulk-upsert-booking-custom-attributes) operation.

## Structure

`BookingCustomAttributeUpsertResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `bookingId` | `?string` | Optional | The ID of the [booking](../../doc/models/booking.md) associated with the custom attribute. | getBookingId(): ?string | setBookingId(?string bookingId): void |
| `customAttribute` | [`?CustomAttribute`](../../doc/models/custom-attribute.md) | Optional | A custom attribute value. Each custom attribute value has a corresponding<br>`CustomAttributeDefinition` object. | getCustomAttribute(): ?CustomAttribute | setCustomAttribute(?CustomAttribute customAttribute): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred while processing the individual request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "booking_id": null,
  "custom_attribute": null,
  "errors": null
}
```

