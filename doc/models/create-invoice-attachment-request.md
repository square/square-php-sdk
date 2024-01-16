
# Create Invoice Attachment Request

Represents a [CreateInvoiceAttachment](../../doc/apis/invoices.md#create-invoice-attachment) request.

## Structure

`CreateInvoiceAttachmentRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `?string` | Optional | A unique string that identifies the `CreateInvoiceAttachment` request.<br>For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).<br>**Constraints**: *Maximum Length*: `128` | getIdempotencyKey(): ?string | setIdempotencyKey(?string idempotencyKey): void |
| `description` | `?string` | Optional | The description of the attachment to display on the invoice.<br>**Constraints**: *Maximum Length*: `128` | getDescription(): ?string | setDescription(?string description): void |

## Example (as JSON)

```json
{
  "description": "Service contract",
  "idempotency_key": "ae5e84f9-4742-4fc1-ba12-a3ce3748f1c3"
}
```

