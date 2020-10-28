
# V1 Bank Account

V1BankAccount

## Structure

`V1BankAccount`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The bank account's Square-issued ID. | getId(): ?string | setId(?string id): void |
| `merchantId` | `?string` | Optional | The Square-issued ID of the merchant associated with the bank account. | getMerchantId(): ?string | setMerchantId(?string merchantId): void |
| `bankName` | `?string` | Optional | The name of the bank that manages the account. | getBankName(): ?string | setBankName(?string bankName): void |
| `name` | `?string` | Optional | The name associated with the bank account. | getName(): ?string | setName(?string name): void |
| `routingNumber` | `?string` | Optional | The bank account's routing number. | getRoutingNumber(): ?string | setRoutingNumber(?string routingNumber): void |
| `accountNumberSuffix` | `?string` | Optional | The last few digits of the bank account number. | getAccountNumberSuffix(): ?string | setAccountNumberSuffix(?string accountNumberSuffix): void |
| `currencyCode` | `?string` | Optional | The currency code of the currency associated with the bank account, in ISO 4217 format. For example, the currency code for US dollars is USD. | getCurrencyCode(): ?string | setCurrencyCode(?string currencyCode): void |
| `type` | [`?string (V1BankAccountType)`](/doc/models/v1-bank-account-type.md) | Optional | - | getType(): ?string | setType(?string type): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "merchant_id": "merchant_id0",
  "bank_name": "bank_name4",
  "name": "name0",
  "routing_number": "routing_number4"
}
```

