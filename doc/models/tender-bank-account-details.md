
# Tender Bank Account Details

Represents the details of a tender with `type` `BANK_ACCOUNT`.

See [BankAccountPaymentDetails](../../doc/models/bank-account-payment-details.md)
for more exposed details of a bank account payment.

## Structure

`TenderBankAccountDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `status` | [`?string(TenderBankAccountDetailsStatus)`](../../doc/models/tender-bank-account-details-status.md) | Optional | Indicates the bank account payment's current status. | getStatus(): ?string | setStatus(?string status): void |

## Example (as JSON)

```json
{
  "status": "FAILED"
}
```

