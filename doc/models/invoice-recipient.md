
# Invoice Recipient

Provides customer data that Square uses to deliver an invoice.

## Structure

`InvoiceRecipient`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `customerId` | `?string` | Optional | The ID of the customer. This is the customer profile ID that<br>you provide when creating a draft invoice.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `255` | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `givenName` | `?string` | Optional | The recipient's given (that is, first) name. | getGivenName(): ?string | setGivenName(?string givenName): void |
| `familyName` | `?string` | Optional | The recipient's family (that is, last) name. | getFamilyName(): ?string | setFamilyName(?string familyName): void |
| `emailAddress` | `?string` | Optional | The recipient's email address. | getEmailAddress(): ?string | setEmailAddress(?string emailAddress): void |
| `address` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. | getAddress(): ?Address | setAddress(?Address address): void |
| `phoneNumber` | `?string` | Optional | The recipient's phone number. | getPhoneNumber(): ?string | setPhoneNumber(?string phoneNumber): void |
| `companyName` | `?string` | Optional | The name of the recipient's company. | getCompanyName(): ?string | setCompanyName(?string companyName): void |

## Example (as JSON)

```json
{
  "customer_id": "customer_id8",
  "given_name": "given_name2",
  "family_name": "family_name6",
  "email_address": "email_address2",
  "address": {
    "address_line_1": "address_line_16",
    "address_line_2": "address_line_26",
    "address_line_3": "address_line_32",
    "locality": "locality6",
    "sublocality": "sublocality6"
  }
}
```

