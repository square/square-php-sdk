
# Vendor

Represents a supplier to a seller.

## Structure

`Vendor`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | A unique Square-generated ID for the [Vendor](../../doc/models/vendor.md).<br>This field is required when attempting to update a [Vendor](../../doc/models/vendor.md).<br>**Constraints**: *Maximum Length*: `100` | getId(): ?string | setId(?string id): void |
| `createdAt` | `?string` | Optional | An RFC 3339-formatted timestamp that indicates when the<br>[Vendor](../../doc/models/vendor.md) was created.<br>**Constraints**: *Maximum Length*: `34` | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | An RFC 3339-formatted timestamp that indicates when the<br>[Vendor](../../doc/models/vendor.md) was last updated.<br>**Constraints**: *Maximum Length*: `34` | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `name` | `?string` | Optional | The name of the [Vendor](../../doc/models/vendor.md).<br>This field is required when attempting to create or update a [Vendor](../../doc/models/vendor.md).<br>**Constraints**: *Maximum Length*: `100` | getName(): ?string | setName(?string name): void |
| `address` | [`?Address`](../../doc/models/address.md) | Optional | Represents a postal address in a country.<br>For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses). | getAddress(): ?Address | setAddress(?Address address): void |
| `contacts` | [`?(VendorContact[])`](../../doc/models/vendor-contact.md) | Optional | The contacts of the [Vendor](../../doc/models/vendor.md). | getContacts(): ?array | setContacts(?array contacts): void |
| `accountNumber` | `?string` | Optional | The account number of the [Vendor](../../doc/models/vendor.md).<br>**Constraints**: *Maximum Length*: `100` | getAccountNumber(): ?string | setAccountNumber(?string accountNumber): void |
| `note` | `?string` | Optional | A note detailing information about the [Vendor](../../doc/models/vendor.md).<br>**Constraints**: *Maximum Length*: `4096` | getNote(): ?string | setNote(?string note): void |
| `version` | `?int` | Optional | The version of the [Vendor](../../doc/models/vendor.md). | getVersion(): ?int | setVersion(?int version): void |
| `status` | [`?string (VendorStatus)`](../../doc/models/vendor-status.md) | Optional | The status of the [Vendor](../../doc/models/vendor.md),<br>whether a [Vendor](../../doc/models/vendor.md) is active or inactive. | getStatus(): ?string | setStatus(?string status): void |

## Example (as JSON)

```json
{
  "id": null,
  "name": null,
  "address": null,
  "contacts": null,
  "account_number": null,
  "note": null,
  "version": null,
  "status": null
}
```

