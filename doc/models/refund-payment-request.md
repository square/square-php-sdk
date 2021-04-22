
# Refund Payment Request

Describes a request to refund a payment using [RefundPayment](/doc/apis/refunds.md#refund-payment).

## Structure

`RefundPaymentRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `string` | Required | A unique string that identifies this `RefundPayment` request. The key can be any valid string<br>but must be unique for every `RefundPayment` request.<br><br>For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).<br>**Constraints**: *Minimum Length*: `1` | getIdempotencyKey(): string | setIdempotencyKey(string idempotencyKey): void |
| `amountMoney` | [`Money`](/doc/models/money.md) | Required | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAmountMoney(): Money | setAmountMoney(Money amountMoney): void |
| `appFeeMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAppFeeMoney(): ?Money | setAppFeeMoney(?Money appFeeMoney): void |
| `paymentId` | `string` | Required | The unique ID of the payment being refunded.<br>**Constraints**: *Minimum Length*: `1` | getPaymentId(): string | setPaymentId(string paymentId): void |
| `reason` | `?string` | Optional | A description of the reason for the refund.<br>**Constraints**: *Maximum Length*: `192` | getReason(): ?string | setReason(?string reason): void |

## Example (as JSON)

```json
{
  "amount_money": {
    "amount": 100,
    "currency": "USD"
  },
  "idempotency_key": "a7e36d40-d24b-11e8-b568-0800200c9a66",
  "payment_id": "UNOE3kv2BZwqHlJ830RCt5YCuaB"
}
```

