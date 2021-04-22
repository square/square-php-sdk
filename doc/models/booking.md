
# Booking

Represents a booking as a time-bound service contract for a seller's staff member to provide a specified service
at a given location to a requesting customer in one or more appointment segments.

## Structure

`Booking`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | A unique ID of this object representing a booking. | getId(): ?string | setId(?string id): void |
| `version` | `?int` | Optional | The revision number for the booking used for optimistic concurrency. | getVersion(): ?int | setVersion(?int version): void |
| `status` | [`?string (BookingStatus)`](/doc/models/booking-status.md) | Optional | Supported booking statuses. | getStatus(): ?string | setStatus(?string status): void |
| `createdAt` | `?string` | Optional | The timestamp specifying the creation time of this booking, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The timestamp specifying the most recent update time of this booking, in RFC 3339 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `startAt` | `?string` | Optional | The timestamp specifying the starting time of this booking, in RFC 3339 format. | getStartAt(): ?string | setStartAt(?string startAt): void |
| `locationId` | `?string` | Optional | The ID of the [Location](/doc/models/location.md) object representing the location where the booked service is provided. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `customerId` | `?string` | Optional | The ID of the [Customer](/doc/models/customer.md) object representing the customer attending this booking | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `customerNote` | `?string` | Optional | The free-text field for the customer to supply notes about the booking. For example, the note can be preferences that cannot be expressed by supported attributes of a relevant [CatalogObject](/doc/models/catalog-object.md) instance.<br>**Constraints**: *Maximum Length*: `4096` | getCustomerNote(): ?string | setCustomerNote(?string customerNote): void |
| `sellerNote` | `?string` | Optional | The free-text field for the seller to supply notes about the booking. For example, the note can be preferences that cannot be expressed by supported attributes of a specific [CatalogObject](/doc/models/catalog-object.md) instance.<br>This field should not be visible to customers.<br>**Constraints**: *Maximum Length*: `4096` | getSellerNote(): ?string | setSellerNote(?string sellerNote): void |
| `appointmentSegments` | [`?(AppointmentSegment[])`](/doc/models/appointment-segment.md) | Optional | A list of appointment segments for this booking. | getAppointmentSegments(): ?array | setAppointmentSegments(?array appointmentSegments): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "version": 172,
  "status": "CANCELLED_BY_SELLER",
  "created_at": "created_at2",
  "updated_at": "updated_at4"
}
```

