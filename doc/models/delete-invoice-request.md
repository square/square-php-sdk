
# Delete Invoice Request

Describes a `DeleteInvoice` request.

## Structure

`DeleteInvoiceRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `version` | `?int` | Optional | The version of the [invoice](/doc/models/invoice.md) to delete.<br>If you do not know the version, you can call [GetInvoice](/doc/apis/invoices.md#get-invoice) or<br>[ListInvoices](/doc/apis/invoices.md#list-invoices). | getVersion(): ?int | setVersion(?int version): void |

## Example (as JSON)

```json
{
  "version": 172
}
```

