
# V1 Discount

V1Discount

## Structure

`V1Discount`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The discount's unique ID. | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The discount's name. | getName(): ?string | setName(?string name): void |
| `rate` | `?string` | Optional | The rate of the discount, as a string representation of a decimal number. A value of 0.07 corresponds to a rate of 7%. This rate is 0 if discount_type is VARIABLE_PERCENTAGE. | getRate(): ?string | setRate(?string rate): void |
| `amountMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getAmountMoney(): ?V1Money | setAmountMoney(?V1Money amountMoney): void |
| `discountType` | [`?string (V1DiscountDiscountType)`](/doc/models/v1-discount-discount-type.md) | Optional | - | getDiscountType(): ?string | setDiscountType(?string discountType): void |
| `pinRequired` | `?bool` | Optional | Indicates whether a mobile staff member needs to enter their PIN to apply the discount to a payment. | getPinRequired(): ?bool | setPinRequired(?bool pinRequired): void |
| `color` | [`?string (V1DiscountColor)`](/doc/models/v1-discount-color.md) | Optional | - | getColor(): ?string | setColor(?string color): void |
| `v2Id` | `?string` | Optional | The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations share the same v2 ID. | getV2Id(): ?string | setV2Id(?string v2Id): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "rate": "rate0",
  "amount_money": {
    "amount": 186,
    "currency_code": "KRW"
  },
  "discount_type": "VARIABLE_PERCENTAGE"
}
```

