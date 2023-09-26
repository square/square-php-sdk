
# Signature Image

## Structure

`SignatureImage`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `imageType` | `?string` | Optional | The mime/type of the image data.<br>Use `image/png;base64` for png. | getImageType(): ?string | setImageType(?string imageType): void |
| `data` | `?string` | Optional | The base64 representation of the image. | getData(): ?string | setData(?string data): void |

## Example (as JSON)

```json
{
  "image_type": "image_type4",
  "data": "data8"
}
```

