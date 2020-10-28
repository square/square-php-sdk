
# V1 List Refunds Response

## Structure

`V1ListRefundsResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `items` | [`?(V1Refund[])`](/doc/models/v1-refund.md) | Optional | - | getItems(): ?array | setItems(?array items): void |

## Example (as JSON)

```json
{
  "items": [
    {
      "type": "PARTIAL",
      "reason": "reason7",
      "refunded_money": {
        "amount": 17,
        "currency_code": "XTS"
      },
      "refunded_processing_fee_money": {
        "amount": 59,
        "currency_code": "GYD"
      },
      "refunded_tax_money": {
        "amount": 115,
        "currency_code": "NIO"
      }
    },
    {
      "type": "FULL",
      "reason": "reason6",
      "refunded_money": {
        "amount": 18,
        "currency_code": "XXX"
      },
      "refunded_processing_fee_money": {
        "amount": 60,
        "currency_code": "HKD"
      },
      "refunded_tax_money": {
        "amount": 116,
        "currency_code": "NOK"
      }
    }
  ]
}
```

