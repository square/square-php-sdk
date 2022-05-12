
# Create Vendor Request

Represents an input to a call to [CreateVendor](../../doc/apis/vendors.md#create-vendor).

## Structure

`CreateVendorRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `string` | Required | A client-supplied, universally unique identifier (UUID) to make this [CreateVendor](../../doc/apis/vendors.md#create-vendor) call idempotent.<br><br>See [Idempotency](https://developer.squareup.com/docs/basics/api101/idempotency) in the<br>[API Development 101](https://developer.squareup.com/docs/basics/api101/overview) section for more<br>information.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `128` | getIdempotencyKey(): string | setIdempotencyKey(string idempotencyKey): void |
| `vendor` | [`?Vendor`](../../doc/models/vendor.md) | Optional | Represents a supplier to a seller. | getVendor(): ?Vendor | setVendor(?Vendor vendor): void |

## Example (as JSON)

```json
{
  "idempotency_key": "idempotency_key6",
  "vendor": null
}
```

