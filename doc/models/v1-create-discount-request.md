
# V1 Create Discount Request

## Structure

`V1CreateDiscountRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `body` | [`?V1Discount`](/doc/models/v1-discount.md) | Optional | V1Discount | getBody(): ?V1Discount | setBody(?V1Discount body): void |

## Example (as JSON)

```json
{
  "body": {
    "id": "id6",
    "name": "name6",
    "rate": "rate4",
    "amount_money": {
      "amount": 194,
      "currency_code": "KWD"
    },
    "discount_type": "VARIABLE_AMOUNT"
  }
}
```

