
# Payment

Represents a payment processed by the Square API.

## Structure

`Payment`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | Unique ID for the payment. | getId(): ?string | setId(?string id): void |
| `createdAt` | `?string` | Optional | Timestamp of when the payment was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | Timestamp of when the payment was last updated, in RFC 3339 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `amountMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAmountMoney(): ?Money | setAmountMoney(?Money amountMoney): void |
| `tipMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTipMoney(): ?Money | setTipMoney(?Money tipMoney): void |
| `totalMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTotalMoney(): ?Money | setTotalMoney(?Money totalMoney): void |
| `appFeeMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAppFeeMoney(): ?Money | setAppFeeMoney(?Money appFeeMoney): void |
| `processingFee` | [`?(ProcessingFee[])`](/doc/models/processing-fee.md) | Optional | Processing fees and fee adjustments assessed by Square on this payment. | getProcessingFee(): ?array | setProcessingFee(?array processingFee): void |
| `refundedMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getRefundedMoney(): ?Money | setRefundedMoney(?Money refundedMoney): void |
| `status` | `?string` | Optional | Indicates whether the payment is `APPROVED`, `COMPLETED`, `CANCELED`, or `FAILED`. | getStatus(): ?string | setStatus(?string status): void |
| `delayDuration` | `?string` | Optional | The duration of time after the payment's creation when Square automatically applies the<br>`delay_action` to the payment. This automatic `delay_action` applies only to payments that<br>don't reach a terminal state (COMPLETED, CANCELED, or FAILED) before the `delay_duration`<br>time period.<br><br>This field is specified as a time duration, in RFC 3339 format.<br><br>Notes:<br>This feature is only supported for card payments.<br><br>Default:<br><br>- Card Present payments: "PT36H" (36 hours) from the creation time.<br>- Card Not Present payments: "P7D" (7 days) from the creation time. | getDelayDuration(): ?string | setDelayDuration(?string delayDuration): void |
| `delayAction` | `?string` | Optional | The action to be applied to the payment when the `delay_duration` has elapsed. This field<br>is read only.<br><br>Current values include:<br>`CANCEL` | getDelayAction(): ?string | setDelayAction(?string delayAction): void |
| `delayedUntil` | `?string` | Optional | Read only timestamp of when the `delay_action` will automatically be applied,<br>in RFC 3339 format.<br><br>Note that this field is calculated by summing the payment's `delay_duration` and `created_at`<br>fields. The `created_at` field is generated by Square and may not exactly match the<br>time on your local machine. | getDelayedUntil(): ?string | setDelayedUntil(?string delayedUntil): void |
| `sourceType` | `?string` | Optional | The source type for this payment<br><br>Current values include: `CARD`. | getSourceType(): ?string | setSourceType(?string sourceType): void |
| `cardDetails` | [`?CardPaymentDetails`](/doc/models/card-payment-details.md) | Optional | Reflects the current status of a card payment. | getCardDetails(): ?CardPaymentDetails | setCardDetails(?CardPaymentDetails cardDetails): void |
| `locationId` | `?string` | Optional | ID of the location associated with the payment. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `orderId` | `?string` | Optional | ID of the order associated with this payment. | getOrderId(): ?string | setOrderId(?string orderId): void |
| `referenceId` | `?string` | Optional | An optional ID that associates this payment with an entity in<br>another system. | getReferenceId(): ?string | setReferenceId(?string referenceId): void |
| `customerId` | `?string` | Optional | The [Customer](#type-customer) ID of the customer associated with the payment. | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `employeeId` | `?string` | Optional | An optional ID of the employee associated with taking this payment. | getEmployeeId(): ?string | setEmployeeId(?string employeeId): void |
| `refundIds` | `?(string[])` | Optional | List of `refund_id`s identifying refunds for this payment. | getRefundIds(): ?array | setRefundIds(?array refundIds): void |
| `buyerEmailAddress` | `?string` | Optional | The buyer's e-mail address | getBuyerEmailAddress(): ?string | setBuyerEmailAddress(?string buyerEmailAddress): void |
| `billingAddress` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getBillingAddress(): ?Address | setBillingAddress(?Address billingAddress): void |
| `shippingAddress` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getShippingAddress(): ?Address | setShippingAddress(?Address shippingAddress): void |
| `note` | `?string` | Optional | An optional note to include when creating a payment | getNote(): ?string | setNote(?string note): void |
| `statementDescriptionIdentifier` | `?string` | Optional | Additional payment information that gets added on the customer's card statement<br>as part of the statement description.<br><br>Note that the `statement_description_identifier` may get truncated on the statement description<br>to fit the required information including the Square identifier (SQ *) and name of the<br>merchant taking the payment. | getStatementDescriptionIdentifier(): ?string | setStatementDescriptionIdentifier(?string statementDescriptionIdentifier): void |
| `receiptNumber` | `?string` | Optional | The payment's receipt number.<br>The field will be missing if a payment is CANCELED | getReceiptNumber(): ?string | setReceiptNumber(?string receiptNumber): void |
| `receiptUrl` | `?string` | Optional | The URL for the payment's receipt.<br>The field will only be populated for COMPLETED payments. | getReceiptUrl(): ?string | setReceiptUrl(?string receiptUrl): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "created_at": "created_at2",
  "updated_at": "updated_at4",
  "amount_money": {
    "amount": 186,
    "currency": "NGN"
  },
  "tip_money": {
    "amount": 190,
    "currency": "CHE"
  }
}
```

