
# Location Booking Profile

The booking profile of a seller's location, including the location's ID and whether the location is enabled for online booking.

## Structure

`LocationBookingProfile`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `locationId` | `?string` | Optional | The ID of the [location](entity:Location). | getLocationId(): ?string | setLocationId(?string locationId): void |
| `bookingSiteUrl` | `?string` | Optional | Url for the online booking site for this location. | getBookingSiteUrl(): ?string | setBookingSiteUrl(?string bookingSiteUrl): void |
| `onlineBookingEnabled` | `?bool` | Optional | Indicates whether the location is enabled for online booking. | getOnlineBookingEnabled(): ?bool | setOnlineBookingEnabled(?bool onlineBookingEnabled): void |

## Example (as JSON)

```json
{
  "location_id": "location_id8",
  "booking_site_url": "booking_site_url4",
  "online_booking_enabled": false
}
```

