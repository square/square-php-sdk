
# Select Options

## Structure

`SelectOptions`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `title` | `string` | Required | The title text to display in the select flow on the Terminal.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `250` | getTitle(): string | setTitle(string title): void |
| `body` | `string` | Required | The body text to display in the select flow on the Terminal.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `10000` | getBody(): string | setBody(string body): void |
| `options` | [`SelectOption[]`](../../doc/models/select-option.md) | Required | Represents the buttons/options that should be displayed in the select flow on the Terminal. | getOptions(): array | setOptions(array options): void |
| `selectedOption` | [`?SelectOption`](../../doc/models/select-option.md) | Optional | - | getSelectedOption(): ?SelectOption | setSelectedOption(?SelectOption selectedOption): void |

## Example (as JSON)

```json
{
  "title": "title0",
  "body": "body0",
  "options": [
    {
      "reference_id": "reference_id0",
      "title": "title2"
    }
  ],
  "selected_option": {
    "reference_id": "reference_id6",
    "title": "title8"
  }
}
```

