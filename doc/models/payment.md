
# Payment

Represents a payment processed by the Square API.

## Structure

`Payment`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | A unique ID for the payment.<br>**Constraints**: *Maximum Length*: `192` | getId(): ?string | setId(?string id): void |
| `createdAt` | `?string` | Optional | The timestamp of when the payment was created, in RFC 3339 format.<br>**Constraints**: *Maximum Length*: `32` | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The timestamp of when the payment was last updated, in RFC 3339 format.<br>**Constraints**: *Maximum Length*: `32` | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `amountMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAmountMoney(): ?Money | setAmountMoney(?Money amountMoney): void |
| `tipMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTipMoney(): ?Money | setTipMoney(?Money tipMoney): void |
| `totalMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTotalMoney(): ?Money | setTotalMoney(?Money totalMoney): void |
| `appFeeMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAppFeeMoney(): ?Money | setAppFeeMoney(?Money appFeeMoney): void |
| `processingFee` | [`?(ProcessingFee[])`](/doc/models/processing-fee.md) | Optional | The processing fees and fee adjustments assessed by Square for this payment. | getProcessingFee(): ?array | setProcessingFee(?array processingFee): void |
| `refundedMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getRefundedMoney(): ?Money | setRefundedMoney(?Money refundedMoney): void |
| `status` | `?string` | Optional | Indicates whether the payment is APPROVED, COMPLETED, CANCELED, or FAILED.<br>**Constraints**: *Maximum Length*: `50` | getStatus(): ?string | setStatus(?string status): void |
| `delayDuration` | `?string` | Optional | The duration of time after the payment's creation when Square automatically applies the<br>`delay_action` to the payment. This automatic `delay_action` applies only to payments that<br>do not reach a terminal state (COMPLETED, CANCELED, or FAILED) before the `delay_duration`<br>time period.<br><br>This field is specified as a time duration, in RFC 3339 format.<br><br>Notes:<br>This feature is only supported for card payments.<br><br>Default:<br><br>- Card-present payments: "PT36H" (36 hours) from the creation time.<br>- Card-not-present payments: "P7D" (7 days) from the creation time. | getDelayDuration(): ?string | setDelayDuration(?string delayDuration): void |
| `delayAction` | `?string` | Optional | The action to be applied to the payment when the `delay_duration` has elapsed. This field<br>is read-only.<br><br>Current values include `CANCEL`. | getDelayAction(): ?string | setDelayAction(?string delayAction): void |
| `delayedUntil` | `?string` | Optional | The read-only timestamp of when the `delay_action` is automatically applied,<br>in RFC 3339 format.<br><br>Note that this field is calculated by summing the payment's `delay_duration` and `created_at`<br>fields. The `created_at` field is generated by Square and might not exactly match the<br>time on your local machine. | getDelayedUntil(): ?string | setDelayedUntil(?string delayedUntil): void |
| `sourceType` | `?string` | Optional | The source type for this payment.<br><br>Current values include `CARD`.<br>**Constraints**: *Maximum Length*: `50` | getSourceType(): ?string | setSourceType(?string sourceType): void |
| `cardDetails` | [`?CardPaymentDetails`](/doc/models/card-payment-details.md) | Optional | Reflects the current status of a card payment. | getCardDetails(): ?CardPaymentDetails | setCardDetails(?CardPaymentDetails cardDetails): void |
| `locationId` | `?string` | Optional | The ID of the location associated with the payment.<br>**Constraints**: *Maximum Length*: `50` | getLocationId(): ?string | setLocationId(?string locationId): void |
| `orderId` | `?string` | Optional | The ID of the order associated with the payment.<br>**Constraints**: *Maximum Length*: `192` | getOrderId(): ?string | setOrderId(?string orderId): void |
| `referenceId` | `?string` | Optional | An optional ID that associates the payment with an entity in<br>another system.<br>**Constraints**: *Maximum Length*: `40` | getReferenceId(): ?string | setReferenceId(?string referenceId): void |
| `customerId` | `?string` | Optional | The [Customer](#type-customer) ID of the customer associated with the payment.<br>**Constraints**: *Maximum Length*: `191` | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `employeeId` | `?string` | Optional | An optional ID of the employee associated with taking the payment.<br>**Constraints**: *Maximum Length*: `192` | getEmployeeId(): ?string | setEmployeeId(?string employeeId): void |
| `refundIds` | `?(string[])` | Optional | A list of `refund_id`s identifying refunds for the payment. | getRefundIds(): ?array | setRefundIds(?array refundIds): void |
| `riskEvaluation` | [`?RiskEvaluation`](/doc/models/risk-evaluation.md) | Optional | Represents fraud risk information for the associated payment.<br><br>When you take a payment through Square's Payments API (using the `CreatePayment`<br>endpoint), Square evaluates it and assigns a risk level to the payment. Sellers<br>can use this information to determine the course of action (for example,<br>provide the goods/services or refund the payment). | getRiskEvaluation(): ?RiskEvaluation | setRiskEvaluation(?RiskEvaluation riskEvaluation): void |
| `buyerEmailAddress` | `?string` | Optional | The buyer's email address.<br>**Constraints**: *Maximum Length*: `255` | getBuyerEmailAddress(): ?string | setBuyerEmailAddress(?string buyerEmailAddress): void |
| `billingAddress` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getBillingAddress(): ?Address | setBillingAddress(?Address billingAddress): void |
| `shippingAddress` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getShippingAddress(): ?Address | setShippingAddress(?Address shippingAddress): void |
| `note` | `?string` | Optional | An optional note to include when creating a payment.<br>**Constraints**: *Maximum Length*: `500` | getNote(): ?string | setNote(?string note): void |
| `statementDescriptionIdentifier` | `?string` | Optional | Additional payment information that gets added to the customer's card statement<br>as part of the statement description.<br><br>Note that the `statement_description_identifier` might get truncated on the statement description<br>to fit the required information including the Square identifier (SQ *) and the name of the<br>seller taking the payment. | getStatementDescriptionIdentifier(): ?string | setStatementDescriptionIdentifier(?string statementDescriptionIdentifier): void |
| `receiptNumber` | `?string` | Optional | The payment's receipt number.<br>The field is missing if a payment is canceled.<br>**Constraints**: *Maximum Length*: `4` | getReceiptNumber(): ?string | setReceiptNumber(?string receiptNumber): void |
| `receiptUrl` | `?string` | Optional | The URL for the payment's receipt.<br>The field is only populated for COMPLETED payments.<br>**Constraints**: *Maximum Length*: `255` | getReceiptUrl(): ?string | setReceiptUrl(?string receiptUrl): void |

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

