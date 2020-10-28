
# Order Entry

A lightweight description of an [Order](#type-order) that is returned when `returned_entries` is true on a
[SearchOrderRequest](#type-searchorderrequest)

## Structure

`OrderEntry`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `orderId` | `?string` | Optional | The id of the Order | getOrderId(): ?string | setOrderId(?string orderId): void |
| `version` | `?int` | Optional | Version number which is incremented each time an update is committed to the order.<br>Orders that were not created through the API will not include a version and<br>thus cannot be updated.<br><br>[Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-orders#update-orders). | getVersion(): ?int | setVersion(?int version): void |
| `locationId` | `?string` | Optional | The location id the Order belongs to. | getLocationId(): ?string | setLocationId(?string locationId): void |

## Example (as JSON)

```json
{
  "order_id": "order_id6",
  "version": 172,
  "location_id": "location_id4"
}
```

