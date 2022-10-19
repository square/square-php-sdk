
# Payment Balance Activity Tax on Fee Detail

## Structure

`PaymentBalanceActivityTaxOnFeeDetail`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `paymentId` | `?string` | Optional | The ID of the payment associated with this activity. | getPaymentId(): ?string | setPaymentId(?string paymentId): void |
| `taxRateDescription` | `?string` | Optional | The description of the tax rate being applied. For example: "GST", "HST". | getTaxRateDescription(): ?string | setTaxRateDescription(?string taxRateDescription): void |

## Example (as JSON)

```json
{
  "payment_id": null,
  "tax_rate_description": null
}
```

