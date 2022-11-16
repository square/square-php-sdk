
# Bulk Upsert Booking Custom Attributes Response

Represents a [BulkUpsertBookingCustomAttributes](../../doc/apis/booking-custom-attributes.md#bulk-upsert-booking-custom-attributes) response,
which contains a map of responses that each corresponds to an individual upsert request.

## Structure

`BulkUpsertBookingCustomAttributesResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `values` | [`?array<string,BookingCustomAttributeUpsertResponse>`](../../doc/models/booking-custom-attribute-upsert-response.md) | Optional | A map of responses that correspond to individual upsert requests. Each response has the<br>same ID as the corresponding request and contains either a `booking_id` and `custom_attribute` or an `errors` field. | getValues(): ?array | setValues(?array values): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "values": null,
  "errors": null
}
```

