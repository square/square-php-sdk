
# Fulfillment Pickup Details

Contains details necessary to fulfill a pickup order.

## Structure

`FulfillmentPickupDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `recipient` | [`?FulfillmentRecipient`](../../doc/models/fulfillment-recipient.md) | Optional | Information about the fulfillment recipient. | getRecipient(): ?FulfillmentRecipient | setRecipient(?FulfillmentRecipient recipient): void |
| `expiresAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when this fulfillment expires if it is not accepted. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). The expiration time can only be set up to 7 days in the future.<br>If `expires_at` is not set, this pickup fulfillment is automatically accepted when<br>placed. | getExpiresAt(): ?string | setExpiresAt(?string expiresAt): void |
| `autoCompleteDuration` | `?string` | Optional | The duration of time after which an open and accepted pickup fulfillment<br>is automatically moved to the `COMPLETED` state. The duration must be in RFC 3339<br>format (for example, "P1W3D").<br><br>If not set, this pickup fulfillment remains accepted until it is canceled or completed. | getAutoCompleteDuration(): ?string | setAutoCompleteDuration(?string autoCompleteDuration): void |
| `scheduleType` | [`?string (FulfillmentPickupDetailsScheduleType)`](../../doc/models/fulfillment-pickup-details-schedule-type.md) | Optional | The schedule type of the pickup fulfillment. | getScheduleType(): ?string | setScheduleType(?string scheduleType): void |
| `pickupAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>that represents the start of the pickup window. Must be in RFC 3339 timestamp format, e.g.,<br>"2016-09-04T23:59:33.123Z".<br><br>For fulfillments with the schedule type `ASAP`, this is automatically set<br>to the current time plus the expected duration to prepare the fulfillment. | getPickupAt(): ?string | setPickupAt(?string pickupAt): void |
| `pickupWindowDuration` | `?string` | Optional | The window of time in which the order should be picked up after the `pickup_at` timestamp.<br>Must be in RFC 3339 duration format, e.g., "P1W3D". Can be used as an<br>informational guideline for merchants. | getPickupWindowDuration(): ?string | setPickupWindowDuration(?string pickupWindowDuration): void |
| `prepTimeDuration` | `?string` | Optional | The duration of time it takes to prepare this fulfillment.<br>The duration must be in RFC 3339 format (for example, "P1W3D"). | getPrepTimeDuration(): ?string | setPrepTimeDuration(?string prepTimeDuration): void |
| `note` | `?string` | Optional | A note to provide additional instructions about the pickup<br>fulfillment displayed in the Square Point of Sale application and set by the API.<br>**Constraints**: *Maximum Length*: `500` | getNote(): ?string | setNote(?string note): void |
| `placedAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment was placed. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getPlacedAt(): ?string | setPlacedAt(?string placedAt): void |
| `acceptedAt` | `?string` | Optional | The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)<br>indicating when the fulfillment was accepted. The timestamp must be in RFC 3339 format<br>(for example, "2016-09-04T23:59:33.123Z"). | getAcceptedAt(): ?string | setAcceptedAt(?string acceptedAt): void |
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
  "recipient": null,
  "expires_at": null,
  "auto_complete_duration": null,
  "schedule_type": null,
  "pickup_at": null,
  "pickup_window_duration": null,
  "prep_time_duration": null,
  "note": null,
  "cancel_reason": null,
  "is_curbside_pickup": null,
  "curbside_pickup_details": null
}
```

