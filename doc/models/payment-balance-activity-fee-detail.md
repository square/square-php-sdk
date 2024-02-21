
# Payment Balance Activity Fee Detail

## Structure

`PaymentBalanceActivityFeeDetail`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `paymentId` | `?string` | Optional | The ID of the payment associated with this activity<br>This will only be populated when a principal LedgerEntryToken is also populated.<br>If the fee is independent (there is no principal LedgerEntryToken) then this will likely not<br>be populated. | getPaymentId(): ?string | setPaymentId(?string paymentId): void |

## Example (as JSON)

```json
{
  "payment_id": "payment_id2"
}
```

