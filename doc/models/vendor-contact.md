
# Vendor Contact

Represents a contact of a [Vendor](../../doc/models/vendor.md).

## Structure

`VendorContact`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | A unique Square-generated ID for the [VendorContact](../../doc/models/vendor-contact.md).<br>This field is required when attempting to update a [VendorContact](../../doc/models/vendor-contact.md).<br>**Constraints**: *Maximum Length*: `100` | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The name of the [VendorContact](../../doc/models/vendor-contact.md).<br>This field is required when attempting to create a [Vendor](../../doc/models/vendor.md).<br>**Constraints**: *Maximum Length*: `255` | getName(): ?string | setName(?string name): void |
| `emailAddress` | `?string` | Optional | The email address of the [VendorContact](../../doc/models/vendor-contact.md).<br>**Constraints**: *Maximum Length*: `255` | getEmailAddress(): ?string | setEmailAddress(?string emailAddress): void |
| `phoneNumber` | `?string` | Optional | The phone number of the [VendorContact](../../doc/models/vendor-contact.md).<br>**Constraints**: *Maximum Length*: `255` | getPhoneNumber(): ?string | setPhoneNumber(?string phoneNumber): void |
| `removed` | `?bool` | Optional | The state of the [VendorContact](../../doc/models/vendor-contact.md). | getRemoved(): ?bool | setRemoved(?bool removed): void |
| `ordinal` | `int` | Required | The ordinal of the [VendorContact](../../doc/models/vendor-contact.md). | getOrdinal(): int | setOrdinal(int ordinal): void |

## Example (as JSON)

```json
{
  "id": null,
  "name": null,
  "email_address": null,
  "phone_number": null,
  "removed": null,
  "ordinal": 80
}
```

