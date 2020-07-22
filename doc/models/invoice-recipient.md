## Invoice Recipient

Provides customer data that Square uses to deliver an invoice.

### Structure

`InvoiceRecipient`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `customerId` | `?string` | Optional | The ID of the customer. This is the customer profile ID that<br>you provide when creating a draft invoice. |
| `givenName` | `?string` | Optional | The recipient's given (that is, first) name. |
| `familyName` | `?string` | Optional | The recipient's family (that is, last) name. |
| `emailAddress` | `?string` | Optional | The recipient's email address. |
| `address` | [`?Address`](/doc/models/address.md) | Optional | Represents a physical address. |
| `phoneNumber` | `?string` | Optional | The recipient's phone number. |
| `companyName` | `?string` | Optional | The name of the recipient's company. |

### Example (as JSON)

```json
{
  "customer_id": null,
  "given_name": null,
  "family_name": null,
  "email_address": null,
  "address": null,
  "phone_number": null,
  "company_name": null
}
```

