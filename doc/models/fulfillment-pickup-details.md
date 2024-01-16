
# Fulfillment Pickup Details

Contains details necessary to fulfill a pickup order.

## Structure

`FulfillmentPickupDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `recipient` | [`?FulfillmentRecipient`](../../doc/models/fulfillment-recipient.md) | Optional | Information about the fulfillment recipient. | getRecipient(): ?FulfillmentRecipient | setRecipient(?FulfillmentRecipient recipient): void |
| `expiresAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when this fulfillment expires if it is not marked in progress. The timestamp must be<br>in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z"). The expiration time can only be set<br>up to 7 days in the future. If `expires_at` is not set, any new payments attached to the order<br>are automatically completed. | getExpiresAt(): ?string | setExpiresAt(?string expiresAt): void |
| `autoCompleteDuration` | `?string` | Optional | The duration of time after which an in progress pickup fulfillment is automatically moved<br>to the `COMPLETED` state. The duration must be in RFC 3339 format (for example, "P1W3D").<br><br>If not set, this pickup fulfillment remains in progress until it is canceled or completed. | getAutoCompleteDuration(): ?string | setAutoCompleteDuration(?string autoCompleteDuration): void |
| `scheduleType` | [`?string(FulfillmentPickupDetailsScheduleType)`](../../doc/models/fulfillment-pickup-details-schedule-type.md) | Optional | The schedule type of the pickup fulfillment. | getScheduleType(): ?string | setScheduleType(?string scheduleType): void |
| `pickupAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>that represents the start of the pickup window. Must be in RFC 3339 timestamp format, e.g.,<br>"2016-09-04T23:59:33.123Z".<br><br>For fulfillments with the schedule type `ASAP`, this is automatically set<br>to the current time plus the expected duration to prepare the fulfillment. | getPickupAt(): ?string | setPickupAt(?string pickupAt): void |
| `pickupWindowDuration` | `?string` | Optional | The window of time in which the order should be picked up after the `pickup_at` timestamp.<br>Must be in RFC 3339 duration format, e.g., "P1W3D". Can be used as an<br>informational guideline for merchants. | getPickupWindowDuration(): ?string | setPickupWindowDuration(?string pickupWindowDuration): void |
| `prepTimeDuration` | `?string` | Optional | The duration of time it takes to prepare this fulfillment.<br>The duration must be in RFC 3339 format (for example, "P1W3D"). | getPrepTimeDuration(): ?string | setPrepTimeDuration(?string prepTimeDuration): void |
| `note` | `?string` | Optional | A note to provide additional instructions about the pickup<br>fulfillment displayed in the Square Point of Sale application and set by the API.<br>**Constraints**: *Maximum Length*: `500` | getNote(): ?string | setNote(?string note): void |
| `placedAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment was placed. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getPlacedAt(): ?string | setPlacedAt(?string placedAt): void |
| `acceptedAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment was marked in progress. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getAcceptedAt(): ?string | setAcceptedAt(?string acceptedAt): void |
| `rejectedAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment was rejected. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getRejectedAt(): ?string | setRejectedAt(?string rejectedAt): void |
| `readyAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment is marked as ready for pickup. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getReadyAt(): ?string | setReadyAt(?string readyAt): void |
| `expiredAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment expired. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getExpiredAt(): ?string | setExpiredAt(?string expiredAt): void |
| `pickedUpAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment was picked up by the recipient. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getPickedUpAt(): ?string | setPickedUpAt(?string pickedUpAt): void |
| `canceledAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment was canceled. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getCanceledAt(): ?string | setCanceledAt(?string canceledAt): void |
| `cancelReason` | `?string` | Optional | A description of why the pickup was canceled. The maximum length: 100 characters.<br>**Constraints**: *Maximum Length*: `100` | getCancelReason(): ?string | setCancelReason(?string cancelReason): void |
| `isCurbsidePickup` | `?bool` | Optional | If set to `true`, indicates that this pickup order is for curbside pickup, not in-store pickup. | getIsCurbsidePickup(): ?bool | setIsCurbsidePickup(?bool isCurbsidePickup): void |
| `curbsidePickupDetails` | [`?FulfillmentPickupDetailsCurbsidePickupDetails`](../../doc/models/fulfillment-pickup-details-curbside-pickup-details.md) | Optional | Specific details for curbside pickup. | getCurbsidePickupDetails(): ?FulfillmentPickupDetailsCurbsidePickupDetails | setCurbsidePickupDetails(?FulfillmentPickupDetailsCurbsidePickupDetails curbsidePickupDetails): void |

## Example (as JSON)

```json
{
  "recipient": {
    "customer_id": "customer_id6",
    "display_name": "display_name8",
    "email_address": "email_address4",
    "phone_number": "phone_number4",
    "address": {
      "address_line_1": "address_line_16",
      "address_line_2": "address_line_26",
      "address_line_3": "address_line_32",
      "locality": "locality6",
      "sublocality": "sublocality6"
    }
  },
  "expires_at": "expires_at0",
  "auto_complete_duration": "auto_complete_duration0",
  "schedule_type": "SCHEDULED",
  "pickup_at": "pickup_at8"
}
```

