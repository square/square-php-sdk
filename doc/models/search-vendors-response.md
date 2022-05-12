
# Search Vendors Response

Represents an output from a call to [SearchVendors](../../doc/apis/vendors.md#search-vendors).

## Structure

`SearchVendorsResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Errors encountered when the request fails. | getErrors(): ?array | setErrors(?array errors): void |
| `vendors` | [`?(Vendor[])`](../../doc/models/vendor.md) | Optional | The [Vendor](../../doc/models/vendor.md) objects matching the specified search filter. | getVendors(): ?array | setVendors(?array vendors): void |
| `cursor` | `?string` | Optional | The pagination cursor to be used in a subsequent request. If unset,<br>this is the final response.<br><br>See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for more information. | getCursor(): ?string | setCursor(?string cursor): void |

## Example (as JSON)

```json
{
  "errors": null,
  "vendors": null,
  "cursor": null
}
```

