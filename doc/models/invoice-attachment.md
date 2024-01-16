
# Invoice Attachment

Represents a file attached to an [invoice](../../doc/models/invoice.md).

## Structure

`InvoiceAttachment`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The Square-assigned ID of the attachment. | getId(): ?string | setId(?string id): void |
| `filename` | `?string` | Optional | The file name of the attachment, which is displayed on the invoice. | getFilename(): ?string | setFilename(?string filename): void |
| `description` | `?string` | Optional | The description of the attachment, which is displayed on the invoice.<br>This field maps to the seller-defined **Message** field. | getDescription(): ?string | setDescription(?string description): void |
| `filesize` | `?int` | Optional | The file size of the attachment in bytes. | getFilesize(): ?int | setFilesize(?int filesize): void |
| `hash` | `?string` | Optional | The MD5 hash that was generated from the file contents. | getHash(): ?string | setHash(?string hash): void |
| `mimeType` | `?string` | Optional | The mime type of the attachment.<br>The following mime types are supported:<br>image/gif, image/jpeg, image/png, image/tiff, image/bmp, application/pdf. | getMimeType(): ?string | setMimeType(?string mimeType): void |
| `uploadedAt` | `?string` | Optional | The timestamp when the attachment was uploaded, in RFC 3339 format. | getUploadedAt(): ?string | setUploadedAt(?string uploadedAt): void |

## Example (as JSON)

```json
{
  "id": "id4",
  "filename": "filename6",
  "description": "description6",
  "filesize": 164,
  "hash": "hash0"
}
```

