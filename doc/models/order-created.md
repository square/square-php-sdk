
# Order Created

## Structure

`OrderCreated`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `orderId` | `?string` | Optional | The order's unique ID. | getOrderId(): ?string | setOrderId(?string orderId): void |
| `version` | `?int` | Optional | Version number which is incremented each time an update is committed to the order.<br>Orders that were not created through the API will not include a version and<br>thus cannot be updated.<br><br>[Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-orders#update-orders) | getVersion(): ?int | setVersion(?int version): void |
| `locationId` | `?string` | Optional | The ID of the merchant location this order is associated with. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `state` | [`?string (OrderState)`](/doc/models/order-state.md) | Optional | The state of the order. | getState(): ?string | setState(?string state): void |
| `createdAt` | `?string` | Optional | Timestamp for when the order was created in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |

## Example (as JSON)

```json
{
  "order_id": "order_id6",
  "version": 172,
  "location_id": "location_id4",
  "state": "CANCELED",
  "created_at": "created_at2"
}
```

