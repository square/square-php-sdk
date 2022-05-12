
# Retrieve Vendor Response

Represents an output from a call to [RetrieveVendor](../../doc/apis/vendors.md#retrieve-vendor).

## Structure

`RetrieveVendorResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Errors encountered when the request fails. | getErrors(): ?array | setErrors(?array errors): void |
| `vendor` | [`?Vendor`](../../doc/models/vendor.md) | Optional | Represents a supplier to a seller. | getVendor(): ?Vendor | setVendor(?Vendor vendor): void |

## Example (as JSON)

```json
{
  "errors": null,
  "vendor": null
}
```

