
# Bank Account

Represents a bank account. For more information about
linking a bank account to a Square account, see
[Bank Accounts API](https://developer.squareup.com/docs/docs/bank-accounts-api).

## Structure

`BankAccount`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `string` |  | The unique, Square-issued identifier for the bank account. | getId(): string | setId(string id): void |
| `accountNumberSuffix` | `string` |  | The last few digits of the account number. | getAccountNumberSuffix(): string | setAccountNumberSuffix(string accountNumberSuffix): void |
| `country` | [`string (Country)`](/doc/models/country.md) |  | Indicates the country associated with another entity, such as a business.<br>Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm). | getCountry(): string | setCountry(string country): void |
| `currency` | [`string (Currency)`](/doc/models/currency.md) |  | Indicates the associated currency for an amount of money. Values correspond<br>to [ISO 4217](https://wikipedia.org/wiki/ISO_4217). | getCurrency(): string | setCurrency(string currency): void |
| `accountType` | [`string (BankAccountType)`](/doc/models/bank-account-type.md) |  | Indicates the financial purpose of the bank account. | getAccountType(): string | setAccountType(string accountType): void |
| `holderName` | `string` |  | Name of the account holder. This name must match the name<br>on the targeted bank account record. | getHolderName(): string | setHolderName(string holderName): void |
| `primaryBankIdentificationNumber` | `string` |  | Primary identifier for the bank. For more information, see<br>[Bank Accounts API](https://developer.squareup.com/docs/docs/bank-accounts-api). | getPrimaryBankIdentificationNumber(): string | setPrimaryBankIdentificationNumber(string primaryBankIdentificationNumber): void |
| `secondaryBankIdentificationNumber` | `?string` | Optional | Secondary identifier for the bank. For more information, see<br>[Bank Accounts API](https://developer.squareup.com/docs/docs/bank-accounts-api). | getSecondaryBankIdentificationNumber(): ?string | setSecondaryBankIdentificationNumber(?string secondaryBankIdentificationNumber): void |
| `debitMandateReferenceId` | `?string` | Optional | Reference identifier that will be displayed to UK bank account owners<br>when collecting direct debit authorization. Only required for UK bank accounts. | getDebitMandateReferenceId(): ?string | setDebitMandateReferenceId(?string debitMandateReferenceId): void |
| `referenceId` | `?string` | Optional | Client-provided identifier for linking the banking account to an entity<br>in a third-party system (for example, a bank account number or a user identifier). | getReferenceId(): ?string | setReferenceId(?string referenceId): void |
| `locationId` | `?string` | Optional | The location to which the bank account belongs. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `status` | [`string (BankAccountStatus)`](/doc/models/bank-account-status.md) |  | Indicates the current verification status of a `BankAccount` object. | getStatus(): string | setStatus(string status): void |
| `creditable` | `bool` |  | Indicates whether it is possible for Square to send money to this bank account. | getCreditable(): bool | setCreditable(bool creditable): void |
| `debitable` | `bool` |  | Indicates whether it is possible for Square to take money from this<br>bank account. | getDebitable(): bool | setDebitable(bool debitable): void |
| `fingerprint` | `?string` | Optional | A Square-assigned, unique identifier for the bank account based on the<br>account information. The account fingerprint can be used to compare account<br>entries and determine if the they represent the same real-world bank account. | getFingerprint(): ?string | setFingerprint(?string fingerprint): void |
| `version` | `?int` | Optional | The current version of the `BankAccount`. | getVersion(): ?int | setVersion(?int version): void |
| `bankName` | `?string` | Optional | Read only. Name of actual financial institution.<br>For example "Bank of America". | getBankName(): ?string | setBankName(?string bankName): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "account_number_suffix": "account_number_suffix8",
  "country": "FO",
  "currency": "YER",
  "account_type": "BUSINESS_CHECKING",
  "holder_name": "holder_name4",
  "primary_bank_identification_number": "primary_bank_identification_number8",
  "secondary_bank_identification_number": "secondary_bank_identification_number0",
  "debit_mandate_reference_id": "debit_mandate_reference_id4",
  "reference_id": "reference_id2",
  "location_id": "location_id4",
  "status": "DISABLED",
  "creditable": false,
  "debitable": false,
  "fingerprint": "fingerprint6"
}
```

