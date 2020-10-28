
# V1 Create Modifier Option Request

## Structure

`V1CreateModifierOptionRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `body` | [`?V1ModifierOption`](/doc/models/v1-modifier-option.md) | Optional | V1ModifierOption | getBody(): ?V1ModifierOption | setBody(?V1ModifierOption body): void |

## Example (as JSON)

```json
{
  "body": {
    "id": "id6",
    "name": "name6",
    "price_money": {
      "amount": 194,
      "currency_code": "XBA"
    },
    "on_by_default": false,
    "ordinal": 88
  }
}
```

