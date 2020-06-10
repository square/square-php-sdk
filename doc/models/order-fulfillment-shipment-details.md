## Order Fulfillment Shipment Details

Contains details necessary to fulfill a shipment order.

### Structure

`OrderFulfillmentShipmentDetails`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `recipient` | [`?OrderFulfillmentRecipient`](/doc/models/order-fulfillment-recipient.md) | Optional | Contains information on the recipient of a fulfillment. |
| `carrier` | `?string` | Optional | The shipping carrier being used to ship this fulfillment<br>e.g. UPS, FedEx, USPS, etc. |
| `shippingNote` | `?string` | Optional | A note with additional information for the shipping carrier. |
| `shippingType` | `?string` | Optional | A description of the type of shipping product purchased from the carrier.<br>e.g. First Class, Priority, Express |
| `trackingNumber` | `?string` | Optional | The reference number provided by the carrier to track the shipment's progress. |
| `trackingUrl` | `?string` | Optional | A link to the tracking webpage on the carrier's website. |
| `placedAt` | `?string` | Optional | The [timestamp](#workingwithdates) indicating when the shipment was<br>requested. Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z". |
| `inProgressAt` | `?string` | Optional | The [timestamp](#workingwithdates) indicating when this fulfillment was<br>moved to the `RESERVED` state. Indicates that preparation of this shipment has begun.<br>Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z". |
| `packagedAt` | `?string` | Optional | The [timestamp](#workingwithdates) indicating when this fulfillment<br>was moved to the `PREPARED` state. Indicates that the fulfillment is packaged.<br>Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z". |
| `expectedShippedAt` | `?string` | Optional | The [timestamp](#workingwithdates) indicating when the shipment is<br>expected to be delivered to the shipping carrier. Must be in RFC3339 timestamp<br>format, e.g., "2016-09-04T23:59:33.123Z". |
| `shippedAt` | `?string` | Optional | The [timestamp](#workingwithdates) indicating when this fulfillment<br>was moved to the `COMPLETED`state. Indicates that the fulfillment has been given<br>to the shipping carrier. Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z". |
| `canceledAt` | `?string` | Optional | The [timestamp](#workingwithdates) indicating the shipment was canceled.<br>Must be in RFC3339 timestamp format, e.g., "2016-09-04T23:59:33.123Z". |
| `cancelReason` | `?string` | Optional | A description of why the shipment was canceled. |
| `failedAt` | `?string` | Optional | The [timestamp](#workingwithdates) indicating when the shipment<br>failed to be completed. Must be in RFC3339 timestamp format, e.g.,<br>"2016-09-04T23:59:33.123Z". |
| `failureReason` | `?string` | Optional | A description of why the shipment failed to be completed. |

### Example (as JSON)

```json
{
  "recipient": null,
  "carrier": null,
  "shipping_note": null,
  "shipping_type": null,
  "tracking_number": null,
  "tracking_url": null,
  "placed_at": null,
  "in_progress_at": null,
  "packaged_at": null,
  "expected_shipped_at": null,
  "shipped_at": null,
  "canceled_at": null,
  "cancel_reason": null,
  "failed_at": null,
  "failure_reason": null
}
```

