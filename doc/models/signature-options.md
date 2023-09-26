
# Signature Options

## Structure

`SignatureOptions`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `title` | `string` | Required | The title text to display in the signature capture flow on the Terminal.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `250` | getTitle(): string | setTitle(string title): void |
| `body` | `string` | Required | The body text to display in the signature capture flow on the Terminal.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `10000` | getBody(): string | setBody(string body): void |
| `signature` | [`?(SignatureImage[])`](../../doc/models/signature-image.md) | Optional | An image representation of the collected signature. | getSignature(): ?array | setSignature(?array signature): void |

## Example (as JSON)

```json
{
  "title": "title2",
  "body": "body8",
  "signature": [
    {
      "image_type": "image_type4",
      "data": "data8"
    },
    {
      "image_type": "image_type4",
      "data": "data8"
    },
    {
      "image_type": "image_type4",
      "data": "data8"
    }
  ]
}
```

