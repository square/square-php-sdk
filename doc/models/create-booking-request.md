
# Create Booking Request

## Structure

`CreateBookingRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `?string` | Optional | A unique key to make this request an idempotent operation.<br>**Constraints**: *Maximum Length*: `255` | getIdempotencyKey(): ?string | setIdempotencyKey(?string idempotencyKey): void |
| `booking` | [`Booking`](../../doc/models/booking.md) | Required | Represents a booking as a time-bound service contract for a seller's staff member to provide a specified service<br>at a given location to a requesting customer in one or more appointment segments. | getBooking(): Booking | setBooking(Booking booking): void |

## Example (as JSON)

```json
{
  "idempotency_key": "idempotency_key6",
  "booking": {
    "id": "id4",
    "version": 156,
    "status": "CANCELLED_BY_SELLER",
    "created_at": "created_at2",
    "updated_at": "updated_at0"
  }
}
```

