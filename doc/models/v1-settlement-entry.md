## V1 Settlement Entry

V1SettlementEntry

### Structure

`V1SettlementEntry`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `paymentId` | `?string` | Optional | The settlement's unique identifier. |
| `type` | [`?string (V1SettlementEntryType)`](/doc/models/v1-settlement-entry-type.md) | Optional | -  |
| `amountMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `feeMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |

### Example (as JSON)

```json
{
  "payment_id": null,
  "type": null,
  "amount_money": null,
  "fee_money": null
}
```

