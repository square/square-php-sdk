
# V1 Page Cell

V1PageCell

## Structure

`V1PageCell`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `pageId` | `?string` | Optional | The unique identifier of the page the cell is included on. | getPageId(): ?string | setPageId(?string pageId): void |
| `row` | `?int` | Optional | The row of the cell. Always an integer between 0 and 4, inclusive. | getRow(): ?int | setRow(?int row): void |
| `column` | `?int` | Optional | The column of the cell. Always an integer between 0 and 4, inclusive. | getColumn(): ?int | setColumn(?int column): void |
| `objectType` | [`?string (V1PageCellObjectType)`](/doc/models/v1-page-cell-object-type.md) | Optional | - | getObjectType(): ?string | setObjectType(?string objectType): void |
| `objectId` | `?string` | Optional | The unique identifier of the entity represented in the cell. Not present for cells with an object_type of PLACEHOLDER. | getObjectId(): ?string | setObjectId(?string objectId): void |
| `placeholderType` | [`?string (V1PageCellPlaceholderType)`](/doc/models/v1-page-cell-placeholder-type.md) | Optional | - | getPlaceholderType(): ?string | setPlaceholderType(?string placeholderType): void |

## Example (as JSON)

```json
{
  "page_id": "page_id0",
  "row": 30,
  "column": 204,
  "object_type": "ITEM",
  "object_id": "object_id8"
}
```

