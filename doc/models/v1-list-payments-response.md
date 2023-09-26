
# V1 List Payments Response

## Structure

`V1ListPaymentsResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `items` | [`?(V1Payment[])`](../../doc/models/v1-payment.md) | Optional | - | getItems(): ?array | setItems(?array items): void |

## Example (as JSON)

```json
{
  "items": [
    {
      "id": "id8",
      "merchant_id": "merchant_id8",
      "created_at": "created_at6",
      "creator_id": "creator_id8",
      "device": {
        "id": "id6",
        "name": "name6"
      }
    },
    {
      "id": "id8",
      "merchant_id": "merchant_id8",
      "created_at": "created_at6",
      "creator_id": "creator_id8",
      "device": {
        "id": "id6",
        "name": "name6"
      }
    }
  ]
}
```

