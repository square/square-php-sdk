
# Cancel Invoice Request

Describes a `CancelInvoice` request.

## Structure

`CancelInvoiceRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `version` | `int` | Required | The version of the [invoice](../../doc/models/invoice.md) to cancel.<br>If you do not know the version, you can call<br>[GetInvoice](../../doc/apis/invoices.md#get-invoice) or [ListInvoices](../../doc/apis/invoices.md#list-invoices). | getVersion(): int | setVersion(int version): void |

## Example (as JSON)

```json
{
  "version": 0
}
```

