
# Tender

Represents a tender (i.e., a method of payment) used in a Square transaction.

## Structure

`Tender`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The tender's unique ID. It is the associated payment ID.<br>**Constraints**: *Maximum Length*: `192` | getId(): ?string | setId(?string id): void |
| `locationId` | `?string` | Optional | The ID of the transaction's associated location.<br>**Constraints**: *Maximum Length*: `50` | getLocationId(): ?string | setLocationId(?string locationId): void |
| `transactionId` | `?string` | Optional | The ID of the tender's associated transaction.<br>**Constraints**: *Maximum Length*: `192` | getTransactionId(): ?string | setTransactionId(?string transactionId): void |
| `createdAt` | `?string` | Optional | The timestamp for when the tender was created, in RFC 3339 format.<br>**Constraints**: *Maximum Length*: `32` | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `note` | `?string` | Optional | An optional note associated with the tender at the time of payment.<br>**Constraints**: *Maximum Length*: `500` | getNote(): ?string | setNote(?string note): void |
| `amountMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAmountMoney(): ?Money | setAmountMoney(?Money amountMoney): void |
| `tipMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTipMoney(): ?Money | setTipMoney(?Money tipMoney): void |
| `processingFeeMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getProcessingFeeMoney(): ?Money | setProcessingFeeMoney(?Money processingFeeMoney): void |
| `customerId` | `?string` | Optional | If the tender is associated with a customer or represents a customer's card on file,<br>this is the ID of the associated customer.<br>**Constraints**: *Maximum Length*: `191` | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `type` | [`string (TenderType)`](../../doc/models/tender-type.md) | Required | Indicates a tender's type. | getType(): string | setType(string type): void |
| `cardDetails` | [`?TenderCardDetails`](../../doc/models/tender-card-details.md) | Optional | Represents additional details of a tender with `type` `CARD` or `SQUARE_GIFT_CARD` | getCardDetails(): ?TenderCardDetails | setCardDetails(?TenderCardDetails cardDetails): void |
| `cashDetails` | [`?TenderCashDetails`](../../doc/models/tender-cash-details.md) | Optional | Represents the details of a tender with `type` `CASH`. | getCashDetails(): ?TenderCashDetails | setCashDetails(?TenderCashDetails cashDetails): void |
| `additionalRecipients` | [`?(AdditionalRecipient[])`](../../doc/models/additional-recipient.md) | Optional | Additional recipients (other than the merchant) receiving a portion of this tender.<br>For example, fees assessed on the purchase by a third party integration. | getAdditionalRecipients(): ?array | setAdditionalRecipients(?array additionalRecipients): void |
| `paymentId` | `?string` | Optional | The ID of the [Payment](../../doc/models/payment.md) that corresponds to this tender.<br>This value is only present for payments created with the v2 Payments API.<br>**Constraints**: *Maximum Length*: `192` | getPaymentId(): ?string | setPaymentId(?string paymentId): void |

## Example (as JSON)

```json
{
  "id": null,
  "location_id": null,
  "transaction_id": null,
  "created_at": null,
  "note": null,
  "amount_money": null,
  "tip_money": null,
  "processing_fee_money": null,
  "customer_id": null,
  "type": "WALLET",
  "card_details": null,
  "cash_details": null,
  "additional_recipients": null,
  "payment_id": null
}
```

