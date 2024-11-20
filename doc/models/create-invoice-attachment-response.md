
# Create Invoice Attachment Response

Represents a [CreateInvoiceAttachment](../../doc/apis/invoices.md#create-invoice-attachment) response.

## Structure

`CreateInvoiceAttachmentResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `attachment` | [`?InvoiceAttachment`](../../doc/models/invoice-attachment.md) | Optional | Represents a file attached to an [invoice](../../doc/models/invoice.md). | getAttachment(): ?InvoiceAttachment | setAttachment(?InvoiceAttachment attachment): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Information about errors encountered during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "attachment": {
    "description": "Service contract",
    "filename": "file.jpg",
    "filesize": 102705,
    "hash": "273ee02cb6f5f8a3a8ca23604930dd53",
    "id": "inva:0-3bB9ZuDHiziThQhuC4fwWt",
    "mime_type": "image/jpeg",
    "uploaded_at": "2023-02-03T20:28:14Z"
  },
  "errors": [
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    },
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    },
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    }
  ]
}
```

