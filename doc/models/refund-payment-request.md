
# Refund Payment Request

Describes a request to refund a payment using [RefundPayment](../../doc/apis/refunds.md#refund-payment).

## Structure

`RefundPaymentRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `string` | Required | A unique string that identifies this `RefundPayment` request. The key can be any valid string<br>but must be unique for every `RefundPayment` request.<br><br>Keys are limited to a max of 45 characters - however, the number of allowed characters might be<br>less than 45, if multi-byte characters are used.<br><br>For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).<br>**Constraints**: *Minimum Length*: `1` | getIdempotencyKey(): string | setIdempotencyKey(string idempotencyKey): void |
| `amountMoney` | [`Money`](../../doc/models/money.md) | Required | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAmountMoney(): Money | setAmountMoney(Money amountMoney): void |
| `appFeeMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAppFeeMoney(): ?Money | setAppFeeMoney(?Money appFeeMoney): void |
| `paymentId` | `?string` | Optional | The unique ID of the payment being refunded.<br>Required when unlinked=false, otherwise must not be set. | getPaymentId(): ?string | setPaymentId(?string paymentId): void |
| `destinationId` | `?string` | Optional | The ID indicating where funds will be refunded to. Required for unlinked refunds. For more<br>information, see [Process an Unlinked Refund](https://developer.squareup.com/docs/refunds-api/unlinked-refunds).<br><br>For refunds linked to Square payments, `destination_id` is usually omitted; in this case, funds<br>will be returned to the original payment source. The field may be specified in order to request<br>a cross-method refund to a gift card. For more information,<br>see [Cross-method refunds to gift cards](https://developer.squareup.com/docs/payments-api/refund-payments#cross-method-refunds-to-gift-cards). | getDestinationId(): ?string | setDestinationId(?string destinationId): void |
| `unlinked` | `?bool` | Optional | Indicates that the refund is not linked to a Square payment.<br>If set to true, `destination_id` and `location_id` must be supplied while `payment_id` must not<br>be provided. | getUnlinked(): ?bool | setUnlinked(?bool unlinked): void |
| `locationId` | `?string` | Optional | The location ID associated with the unlinked refund.<br>Required for requests specifying `unlinked=true`.<br>Otherwise, if included when `unlinked=false`, will throw an error.<br>**Constraints**: *Maximum Length*: `50` | getLocationId(): ?string | setLocationId(?string locationId): void |
| `customerId` | `?string` | Optional | The [Customer](entity:Customer) ID of the customer associated with the refund.<br>This is required if the `destination_id` refers to a card on file created using the Cards<br>API. Only allowed when `unlinked=true`. | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `reason` | `?string` | Optional | A description of the reason for the refund.<br>**Constraints**: *Maximum Length*: `192` | getReason(): ?string | setReason(?string reason): void |
| `paymentVersionToken` | `?string` | Optional | Used for optimistic concurrency. This opaque token identifies the current `Payment`<br>version that the caller expects. If the server has a different version of the Payment,<br>the update fails and a response with a VERSION_MISMATCH error is returned.<br>If the versions match, or the field is not provided, the refund proceeds as normal. | getPaymentVersionToken(): ?string | setPaymentVersionToken(?string paymentVersionToken): void |
| `teamMemberId` | `?string` | Optional | An optional [TeamMember](entity:TeamMember) ID to associate with this refund.<br>**Constraints**: *Maximum Length*: `192` | getTeamMemberId(): ?string | setTeamMemberId(?string teamMemberId): void |
| `cashDetails` | [`?DestinationDetailsCashRefundDetails`](../../doc/models/destination-details-cash-refund-details.md) | Optional | Stores details about a cash refund. Contains only non-confidential information. | getCashDetails(): ?DestinationDetailsCashRefundDetails | setCashDetails(?DestinationDetailsCashRefundDetails cashDetails): void |
| `externalDetails` | [`?DestinationDetailsExternalRefundDetails`](../../doc/models/destination-details-external-refund-details.md) | Optional | Stores details about an external refund. Contains only non-confidential information. | getExternalDetails(): ?DestinationDetailsExternalRefundDetails | setExternalDetails(?DestinationDetailsExternalRefundDetails externalDetails): void |

## Example (as JSON)

```json
{
  "amount_money": {
    "amount": 1000,
    "currency": "USD"
  },
  "app_fee_money": {
    "amount": 10,
    "currency": "USD"
  },
  "idempotency_key": "9b7f2dcf-49da-4411-b23e-a2d6af21333a",
  "payment_id": "R2B3Z8WMVt3EAmzYWLZvz7Y69EbZY",
  "reason": "Example",
  "destination_id": "destination_id6",
  "unlinked": false,
  "location_id": "location_id8"
}
```

