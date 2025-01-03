
# Payment Refund

Represents a refund of a payment made using Square. Contains information about
the original payment and the amount of money refunded.

## Structure

`PaymentRefund`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `string` | Required | The unique ID for this refund, generated by Square.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `255` | getId(): string | setId(string id): void |
| `status` | `?string` | Optional | The refund's status:<br><br>- `PENDING` - Awaiting approval.<br>- `COMPLETED` - Successfully completed.<br>- `REJECTED` - The refund was rejected.<br>- `FAILED` - An error occurred.<br>**Constraints**: *Maximum Length*: `50` | getStatus(): ?string | setStatus(?string status): void |
| `locationId` | `?string` | Optional | The location ID associated with the payment this refund is attached to.<br>**Constraints**: *Maximum Length*: `50` | getLocationId(): ?string | setLocationId(?string locationId): void |
| `unlinked` | `?bool` | Optional | Flag indicating whether or not the refund is linked to an existing payment in Square. | getUnlinked(): ?bool | setUnlinked(?bool unlinked): void |
| `destinationType` | `?string` | Optional | The destination type for this refund.<br><br>Current values include `CARD`, `BANK_ACCOUNT`, `WALLET`, `BUY_NOW_PAY_LATER`, `CASH`,<br>`EXTERNAL`, and `SQUARE_ACCOUNT`.<br>**Constraints**: *Maximum Length*: `50` | getDestinationType(): ?string | setDestinationType(?string destinationType): void |
| `destinationDetails` | [`?DestinationDetails`](../../doc/models/destination-details.md) | Optional | Details about a refund's destination. | getDestinationDetails(): ?DestinationDetails | setDestinationDetails(?DestinationDetails destinationDetails): void |
| `amountMoney` | [`Money`](../../doc/models/money.md) | Required | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAmountMoney(): Money | setAmountMoney(Money amountMoney): void |
| `appFeeMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getAppFeeMoney(): ?Money | setAppFeeMoney(?Money appFeeMoney): void |
| `processingFee` | [`?(ProcessingFee[])`](../../doc/models/processing-fee.md) | Optional | Processing fees and fee adjustments assessed by Square for this refund. | getProcessingFee(): ?array | setProcessingFee(?array processingFee): void |
| `paymentId` | `?string` | Optional | The ID of the payment associated with this refund.<br>**Constraints**: *Maximum Length*: `192` | getPaymentId(): ?string | setPaymentId(?string paymentId): void |
| `orderId` | `?string` | Optional | The ID of the order associated with the refund.<br>**Constraints**: *Maximum Length*: `192` | getOrderId(): ?string | setOrderId(?string orderId): void |
| `reason` | `?string` | Optional | The reason for the refund.<br>**Constraints**: *Maximum Length*: `192` | getReason(): ?string | setReason(?string reason): void |
| `createdAt` | `?string` | Optional | The timestamp of when the refund was created, in RFC 3339 format.<br>**Constraints**: *Maximum Length*: `32` | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The timestamp of when the refund was last updated, in RFC 3339 format.<br>**Constraints**: *Maximum Length*: `32` | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `teamMemberId` | `?string` | Optional | An optional ID of the team member associated with taking the payment.<br>**Constraints**: *Maximum Length*: `192` | getTeamMemberId(): ?string | setTeamMemberId(?string teamMemberId): void |
| `terminalRefundId` | `?string` | Optional | An optional ID for a Terminal refund. | getTerminalRefundId(): ?string | setTerminalRefundId(?string terminalRefundId): void |

## Example (as JSON)

```json
{
  "id": "id4",
  "status": "status6",
  "location_id": "location_id8",
  "unlinked": false,
  "destination_type": "destination_type8",
  "destination_details": {
    "card_details": {
      "card": {
        "id": "id6",
        "card_brand": "OTHER_BRAND",
        "last_4": "last_48",
        "exp_month": 228,
        "exp_year": 68
      },
      "entry_method": "entry_method8",
      "auth_result_code": "auth_result_code0"
    },
    "cash_details": {
      "seller_supplied_money": {
        "amount": 36,
        "currency": "MKD"
      },
      "change_back_money": {
        "amount": 78,
        "currency": "XBD"
      }
    },
    "external_details": {
      "type": "type6",
      "source": "source0",
      "source_id": "source_id8"
    }
  },
  "amount_money": {
    "amount": 186,
    "currency": "AUD"
  }
}
```

