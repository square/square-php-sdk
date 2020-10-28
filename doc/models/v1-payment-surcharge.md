
# V1 Payment Surcharge

V1PaymentSurcharge

## Structure

`V1PaymentSurcharge`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `name` | `?string` | Optional | The name of the surcharge. | getName(): ?string | setName(?string name): void |
| `appliedMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getAppliedMoney(): ?V1Money | setAppliedMoney(?V1Money appliedMoney): void |
| `rate` | `?string` | Optional | The amount of the surcharge as a percentage. The percentage is provided as a string representing the decimal equivalent of the percentage. For example, "0.7" corresponds to a 7% surcharge. Exactly one of rate or amount_money should be set. | getRate(): ?string | setRate(?string rate): void |
| `amountMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getAmountMoney(): ?V1Money | setAmountMoney(?V1Money amountMoney): void |
| `type` | [`?string (V1PaymentSurchargeType)`](/doc/models/v1-payment-surcharge-type.md) | Optional | - | getType(): ?string | setType(?string type): void |
| `taxable` | `?bool` | Optional | Indicates whether the surcharge is taxable. | getTaxable(): ?bool | setTaxable(?bool taxable): void |
| `taxes` | [`?(V1PaymentTax[])`](/doc/models/v1-payment-tax.md) | Optional | The list of taxes that should be applied to the surcharge. | getTaxes(): ?array | setTaxes(?array taxes): void |
| `surchargeId` | `?string` | Optional | A Square-issued unique identifier associated with the surcharge. | getSurchargeId(): ?string | setSurchargeId(?string surchargeId): void |

## Example (as JSON)

```json
{
  "name": "name0",
  "applied_money": {
    "amount": 196,
    "currency_code": "LYD"
  },
  "rate": "rate0",
  "amount_money": {
    "amount": 186,
    "currency_code": "KRW"
  },
  "type": "CUSTOM"
}
```

