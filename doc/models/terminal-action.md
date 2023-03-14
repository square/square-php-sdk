
# Terminal Action

Represents an action processed by the Square Terminal.

## Structure

`TerminalAction`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | A unique ID for this `TerminalAction`.<br>**Constraints**: *Minimum Length*: `10`, *Maximum Length*: `255` | getId(): ?string | setId(?string id): void |
| `deviceId` | `?string` | Optional | The unique Id of the device intended for this `TerminalAction`.<br>The Id can be retrieved from /v2/devices api. | getDeviceId(): ?string | setDeviceId(?string deviceId): void |
| `deadlineDuration` | `?string` | Optional | The duration as an RFC 3339 duration, after which the action will be automatically canceled.<br>TerminalActions that are `PENDING` will be automatically `CANCELED` and have a cancellation reason<br>of `TIMED_OUT`<br><br>Default: 5 minutes from creation<br><br>Maximum: 5 minutes | getDeadlineDuration(): ?string | setDeadlineDuration(?string deadlineDuration): void |
| `status` | `?string` | Optional | The status of the `TerminalAction`.<br>Options: `PENDING`, `IN_PROGRESS`, `CANCEL_REQUESTED`, `CANCELED`, `COMPLETED` | getStatus(): ?string | setStatus(?string status): void |
| `cancelReason` | [`?string (ActionCancelReason)`](../../doc/models/action-cancel-reason.md) | Optional | - | getCancelReason(): ?string | setCancelReason(?string cancelReason): void |
| `createdAt` | `?string` | Optional | The time when the `TerminalAction` was created as an RFC 3339 timestamp. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The time when the `TerminalAction` was last updated as an RFC 3339 timestamp. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `appId` | `?string` | Optional | The ID of the application that created the action. | getAppId(): ?string | setAppId(?string appId): void |
| `type` | [`?string (TerminalActionActionType)`](../../doc/models/terminal-action-action-type.md) | Optional | Describes the type of this unit and indicates which field contains the unit information. This is an ‘open’ enum. | getType(): ?string | setType(?string type): void |
| `saveCardOptions` | [`?SaveCardOptions`](../../doc/models/save-card-options.md) | Optional | Describes save-card action fields. | getSaveCardOptions(): ?SaveCardOptions | setSaveCardOptions(?SaveCardOptions saveCardOptions): void |
| `receiptOptions` | [`?ReceiptOptions`](../../doc/models/receipt-options.md) | Optional | Describes receipt action fields. | getReceiptOptions(): ?ReceiptOptions | setReceiptOptions(?ReceiptOptions receiptOptions): void |
| `deviceMetadata` | [`?DeviceMetadata`](../../doc/models/device-metadata.md) | Optional | - | getDeviceMetadata(): ?DeviceMetadata | setDeviceMetadata(?DeviceMetadata deviceMetadata): void |

## Example (as JSON)

```json
{
  "id": null,
  "device_id": null,
  "deadline_duration": null,
  "status": null,
  "cancel_reason": null,
  "created_at": null,
  "updated_at": null,
  "app_id": null,
  "type": null,
  "save_card_options": null,
  "receipt_options": null,
  "device_metadata": null
}
```

