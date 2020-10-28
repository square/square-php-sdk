
# V1 Payment

A payment represents a paid transaction between a Square merchant and a
customer. Payment details are usually available from Connect API endpoints
within a few minutes after the transaction completes.

Each Payment object includes several fields that end in `_money`. These fields
describe the various amounts of money that contribute to the payment total:

<ul>
<li>
Monetary values are <b>positive</b> if they represent an
<em>increase</em> in the amount of money the merchant receives (e.g.,
<code>tax_money</code>, <code>tip_money</code>).
</li>
<li>
Monetary values are <b>negative</b> if they represent an
<em>decrease</em> in the amount of money the merchant receives (e.g.,
<code>discount_money</code>, <code>refunded_money</code>).
</li>
</ul>


## Structure

`V1Payment`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The payment's unique identifier. | getId(): ?string | setId(?string id): void |
| `merchantId` | `?string` | Optional | The unique identifier of the merchant that took the payment. | getMerchantId(): ?string | setMerchantId(?string merchantId): void |
| `createdAt` | `?string` | Optional | The time when the payment was created, in ISO 8601 format. Reflects the time of the first payment if the object represents an incomplete partial payment, and the time of the last or complete payment otherwise. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `creatorId` | `?string` | Optional | The unique identifier of the Square account that took the payment. | getCreatorId(): ?string | setCreatorId(?string creatorId): void |
| `device` | [`?Device`](/doc/models/device.md) | Optional | - | getDevice(): ?Device | setDevice(?Device device): void |
| `paymentUrl` | `?string` | Optional | The URL of the payment's detail page in the merchant dashboard. The merchant must be signed in to the merchant dashboard to view this page. | getPaymentUrl(): ?string | setPaymentUrl(?string paymentUrl): void |
| `receiptUrl` | `?string` | Optional | The URL of the receipt for the payment. Note that for split tender<br>payments, this URL corresponds to the receipt for the first tender<br>listed in the payment's tender field. Each Tender object has its own<br>receipt_url field you can use to get the other receipts associated with<br>a split tender payment. | getReceiptUrl(): ?string | setReceiptUrl(?string receiptUrl): void |
| `inclusiveTaxMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getInclusiveTaxMoney(): ?V1Money | setInclusiveTaxMoney(?V1Money inclusiveTaxMoney): void |
| `additiveTaxMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getAdditiveTaxMoney(): ?V1Money | setAdditiveTaxMoney(?V1Money additiveTaxMoney): void |
| `taxMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getTaxMoney(): ?V1Money | setTaxMoney(?V1Money taxMoney): void |
| `tipMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getTipMoney(): ?V1Money | setTipMoney(?V1Money tipMoney): void |
| `discountMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getDiscountMoney(): ?V1Money | setDiscountMoney(?V1Money discountMoney): void |
| `totalCollectedMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getTotalCollectedMoney(): ?V1Money | setTotalCollectedMoney(?V1Money totalCollectedMoney): void |
| `processingFeeMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getProcessingFeeMoney(): ?V1Money | setProcessingFeeMoney(?V1Money processingFeeMoney): void |
| `netTotalMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getNetTotalMoney(): ?V1Money | setNetTotalMoney(?V1Money netTotalMoney): void |
| `refundedMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getRefundedMoney(): ?V1Money | setRefundedMoney(?V1Money refundedMoney): void |
| `swedishRoundingMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getSwedishRoundingMoney(): ?V1Money | setSwedishRoundingMoney(?V1Money swedishRoundingMoney): void |
| `grossSalesMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getGrossSalesMoney(): ?V1Money | setGrossSalesMoney(?V1Money grossSalesMoney): void |
| `netSalesMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getNetSalesMoney(): ?V1Money | setNetSalesMoney(?V1Money netSalesMoney): void |
| `inclusiveTax` | [`?(V1PaymentTax[])`](/doc/models/v1-payment-tax.md) | Optional | All of the inclusive taxes associated with the payment. | getInclusiveTax(): ?array | setInclusiveTax(?array inclusiveTax): void |
| `additiveTax` | [`?(V1PaymentTax[])`](/doc/models/v1-payment-tax.md) | Optional | All of the additive taxes associated with the payment. | getAdditiveTax(): ?array | setAdditiveTax(?array additiveTax): void |
| `tender` | [`?(V1Tender[])`](/doc/models/v1-tender.md) | Optional | All of the tenders associated with the payment. | getTender(): ?array | setTender(?array tender): void |
| `refunds` | [`?(V1Refund[])`](/doc/models/v1-refund.md) | Optional | All of the refunds applied to the payment. Note that the value of all refunds on a payment can exceed the value of all tenders if a merchant chooses to refund money to a tender after previously accepting returned goods as part of an exchange. | getRefunds(): ?array | setRefunds(?array refunds): void |
| `itemizations` | [`?(V1PaymentItemization[])`](/doc/models/v1-payment-itemization.md) | Optional | The items purchased in the payment. | getItemizations(): ?array | setItemizations(?array itemizations): void |
| `surchargeMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getSurchargeMoney(): ?V1Money | setSurchargeMoney(?V1Money surchargeMoney): void |
| `surcharges` | [`?(V1PaymentSurcharge[])`](/doc/models/v1-payment-surcharge.md) | Optional | A list of all surcharges associated with the payment. | getSurcharges(): ?array | setSurcharges(?array surcharges): void |
| `isPartial` | `?bool` | Optional | Indicates whether or not the payment is only partially paid for.<br>If true, this payment will have the tenders collected so far, but the<br>itemizations will be empty until the payment is completed. | getIsPartial(): ?bool | setIsPartial(?bool isPartial): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "merchant_id": "merchant_id0",
  "created_at": "created_at2",
  "creator_id": "creator_id0",
  "device": {
    "id": "id6",
    "name": "name6"
  }
}
```

