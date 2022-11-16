
# Bulk Delete Order Custom Attributes Request Delete Custom Attribute

Represents one delete within the bulk operation.

## Structure

`BulkDeleteOrderCustomAttributesRequestDeleteCustomAttribute`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `key` | `?string` | Optional | The key of the custom attribute to delete.  This key must match the key<br>of an existing custom attribute definition.<br>**Constraints**: *Pattern*: `^([a-zA-Z0-9_-]+:)?[a-zA-Z0-9_-]{1,60}$` | getKey(): ?string | setKey(?string key): void |
| `orderId` | `string` | Required | The ID of the target [order](../../doc/models/order.md). | getOrderId(): string | setOrderId(string orderId): void |

## Example (as JSON)

```json
{
  "order_id": "order_id6"
}
```

