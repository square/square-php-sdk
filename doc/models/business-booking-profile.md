
# Business Booking Profile

## Structure

`BusinessBookingProfile`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `sellerId` | `?string` | Optional | The ID of the seller, obtainable using the Merchants API. | getSellerId(): ?string | setSellerId(?string sellerId): void |
| `createdAt` | `?string` | Optional | The RFC 3339 timestamp specifying the booking's creation time. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `bookingEnabled` | `?bool` | Optional | Indicates whether the seller is open for booking. | getBookingEnabled(): ?bool | setBookingEnabled(?bool bookingEnabled): void |
| `customerTimezoneChoice` | [`?string (BusinessBookingProfileCustomerTimezoneChoice)`](/doc/models/business-booking-profile-customer-timezone-choice.md) | Optional | Choices of customer-facing time zone used for bookings. | getCustomerTimezoneChoice(): ?string | setCustomerTimezoneChoice(?string customerTimezoneChoice): void |
| `bookingPolicy` | [`?string (BusinessBookingProfileBookingPolicy)`](/doc/models/business-booking-profile-booking-policy.md) | Optional | Policies for accepting bookings. | getBookingPolicy(): ?string | setBookingPolicy(?string bookingPolicy): void |
| `allowUserCancel` | `?bool` | Optional | Indicates whether customers can cancel or reschedule their own bookings (`true`) or not (`false`). | getAllowUserCancel(): ?bool | setAllowUserCancel(?bool allowUserCancel): void |
| `businessAppointmentSettings` | [`?BusinessAppointmentSettings`](/doc/models/business-appointment-settings.md) | Optional | The service appointment settings, including where and how the service is provided. | getBusinessAppointmentSettings(): ?BusinessAppointmentSettings | setBusinessAppointmentSettings(?BusinessAppointmentSettings businessAppointmentSettings): void |

## Example (as JSON)

```json
{
  "seller_id": "seller_id8",
  "created_at": "created_at2",
  "booking_enabled": false,
  "customer_timezone_choice": "BUSINESS_LOCATION_TIMEZONE",
  "booking_policy": "ACCEPT_ALL"
}
```

