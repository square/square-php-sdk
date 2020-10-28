
# V1 Refund

V1Refund

## Structure

`V1Refund`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `type` | [`?string (V1RefundType)`](/doc/models/v1-refund-type.md) | Optional | - | getType(): ?string | setType(?string type): void |
| `reason` | `?string` | Optional | The merchant-specified reason for the refund. | getReason(): ?string | setReason(?string reason): void |
| `refundedMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedMoney(): ?V1Money | setRefundedMoney(?V1Money refundedMoney): void |
| `refundedProcessingFeeMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedProcessingFeeMoney(): ?V1Money | setRefundedProcessingFeeMoney(?V1Money refundedProcessingFeeMoney): void |
| `refundedTaxMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedTaxMoney(): ?V1Money | setRefundedTaxMoney(?V1Money refundedTaxMoney): void |
| `refundedAdditiveTaxMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedAdditiveTaxMoney(): ?V1Money | setRefundedAdditiveTaxMoney(?V1Money refundedAdditiveTaxMoney): void |
| `refundedAdditiveTax` | [`?(V1PaymentTax[])`](/doc/models/v1-payment-tax.md) | Optional | All of the additive taxes associated with the refund. | getRefundedAdditiveTax(): ?array | setRefundedAdditiveTax(?array refundedAdditiveTax): void |
| `refundedInclusiveTaxMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedInclusiveTaxMoney(): ?V1Money | setRefundedInclusiveTaxMoney(?V1Money refundedInclusiveTaxMoney): void |
| `refundedInclusiveTax` | [`?(V1PaymentTax[])`](/doc/models/v1-payment-tax.md) | Optional | All of the inclusive taxes associated with the refund. | getRefundedInclusiveTax(): ?array | setRefundedInclusiveTax(?array refundedInclusiveTax): void |
| `refundedTipMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedTipMoney(): ?V1Money | setRefundedTipMoney(?V1Money refundedTipMoney): void |
| `refundedDiscountMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedDiscountMoney(): ?V1Money | setRefundedDiscountMoney(?V1Money refundedDiscountMoney): void |
| `refundedSurchargeMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedSurchargeMoney(): ?V1Money | setRefundedSurchargeMoney(?V1Money refundedSurchargeMoney): void |
| `refundedSurcharges` | [`?(V1PaymentSurcharge[])`](/doc/models/v1-payment-surcharge.md) | Optional | A list of all surcharges associated with the refund. | getRefundedSurcharges(): ?array | setRefundedSurcharges(?array refundedSurcharges): void |
| `createdAt` | `?string` | Optional | The time when the merchant initiated the refund for Square to process, in ISO 8601 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `processedAt` | `?string` | Optional | The time when Square processed the refund on behalf of the merchant, in ISO 8601 format. | getProcessedAt(): ?string | setProcessedAt(?string processedAt): void |
| `paymentId` | `?string` | Optional | A Square-issued ID associated with the refund. For single-tender refunds, payment_id is the ID of the original payment ID. For split-tender refunds, payment_id is the ID of the original tender. For exchange-based refunds (is_exchange == true), payment_id is the ID of the original payment ID even if the payment includes other tenders. | getPaymentId(): ?string | setPaymentId(?string paymentId): void |
| `merchantId` | `?string` | Optional | - | getMerchantId(): ?string | setMerchantId(?string merchantId): void |
| `isExchange` | `?bool` | Optional | Indicates whether or not the refund is associated with an exchange. If is_exchange is true, the refund reflects the value of goods returned in the exchange not the total money refunded. | getIsExchange(): ?bool | setIsExchange(?bool isExchange): void |

## Example (as JSON)

```json
{
  "type": "FULL",
  "reason": "reason4",
  "refunded_money": {
    "amount": 214,
    "currency_code": "CHW"
  },
  "refunded_processing_fee_money": {
    "amount": 0,
    "currency_code": "LBP"
  },
  "refunded_tax_money": {
    "amount": 148,
    "currency_code": "BAM"
  }
}
```

