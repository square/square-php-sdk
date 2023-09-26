
# Bulk Create Vendors Request

Represents an input to a call to [BulkCreateVendors](../../doc/apis/vendors.md#bulk-create-vendors).

## Structure

`BulkCreateVendorsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `vendors` | [`array<string,Vendor>`](../../doc/models/vendor.md) | Required | Specifies a set of new [Vendor](entity:Vendor) objects as represented by a collection of idempotency-key/`Vendor`-object pairs. | getVendors(): array | setVendors(array vendors): void |

## Example (as JSON)

```json
{
  "vendors": {
    "key0": {
      "id": "id8",
      "created_at": "created_at6",
      "updated_at": "updated_at4",
      "name": "name8",
      "address": {
        "address_line_1": "address_line_16",
        "address_line_2": "address_line_26",
        "address_line_3": "address_line_32",
        "locality": "locality6",
        "sublocality": "sublocality6"
      }
    }
  }
}
```

