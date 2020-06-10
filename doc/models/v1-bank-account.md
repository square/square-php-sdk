## V1 Bank Account

V1BankAccount

### Structure

`V1BankAccount`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `?string` | Optional | The bank account's Square-issued ID. |
| `merchantId` | `?string` | Optional | The Square-issued ID of the merchant associated with the bank account. |
| `bankName` | `?string` | Optional | The name of the bank that manages the account. |
| `name` | `?string` | Optional | The name associated with the bank account. |
| `routingNumber` | `?string` | Optional | The bank account's routing number. |
| `accountNumberSuffix` | `?string` | Optional | The last few digits of the bank account number. |
| `currencyCode` | `?string` | Optional | The currency code of the currency associated with the bank account, in ISO 4217 format. For example, the currency code for US dollars is USD. |
| `type` | [`?string (V1BankAccountType)`](/doc/models/v1-bank-account-type.md) | Optional | -  |

### Example (as JSON)

```json
{
  "id": null,
  "merchant_id": null,
  "bank_name": null,
  "name": null,
  "routing_number": null,
  "account_number_suffix": null,
  "currency_code": null,
  "type": null
}
```

