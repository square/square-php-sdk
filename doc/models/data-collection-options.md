
# Data Collection Options

## Structure

`DataCollectionOptions`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `title` | `string` | Required | The title text to display in the data collection flow on the Terminal.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `250` | getTitle(): string | setTitle(string title): void |
| `body` | `string` | Required | The body text to display under the title in the data collection screen flow on the<br>Terminal.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `10000` | getBody(): string | setBody(string body): void |
| `inputType` | [`string(DataCollectionOptionsInputType)`](../../doc/models/data-collection-options-input-type.md) | Required | Describes the input type of the data. | getInputType(): string | setInputType(string inputType): void |
| `collectedData` | [`?CollectedData`](../../doc/models/collected-data.md) | Optional | - | getCollectedData(): ?CollectedData | setCollectedData(?CollectedData collectedData): void |

## Example (as JSON)

```json
{
  "title": "title4",
  "body": "body4",
  "input_type": "EMAIL",
  "collected_data": {
    "input_text": "input_text0"
  }
}
```

