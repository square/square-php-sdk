## V1 Update Order Request

V1UpdateOrderRequest

### Structure

`V1UpdateOrderRequest`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `action` | [`string (V1UpdateOrderRequestAction)`](/doc/models/v1-update-order-request-action.md) |  | -  |
| `shippedTrackingNumber` | `?string` | Optional | The tracking number of the shipment associated with the order. Only valid if action is COMPLETE. |
| `completedNote` | `?string` | Optional | A merchant-specified note about the completion of the order. Only valid if action is COMPLETE. |
| `refundedNote` | `?string` | Optional | A merchant-specified note about the refunding of the order. Only valid if action is REFUND. |
| `canceledNote` | `?string` | Optional | A merchant-specified note about the canceling of the order. Only valid if action is CANCEL. |

### Example (as JSON)

```json
{
  "action": "COMPLETE",
  "shipped_tracking_number": null,
  "completed_note": null,
  "refunded_note": null,
  "canceled_note": null
}
```

