
# Bulk Retrieve Bookings Request

Request payload for bulk retrieval of bookings.

## Structure

`BulkRetrieveBookingsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `bookingIds` | `string[]` | Required | A non-empty list of [Booking](entity:Booking) IDs specifying bookings to retrieve. | getBookingIds(): array | setBookingIds(array bookingIds): void |

## Example (as JSON)

```json
{
  "booking_ids": [
    "booking_ids8",
    "booking_ids9",
    "booking_ids0"
  ]
}
```

