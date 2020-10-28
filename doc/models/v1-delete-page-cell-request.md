
# V1 Delete Page Cell Request

## Structure

`V1DeletePageCellRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `row` | `?string` | Optional | The row of the cell to clear. Always an integer between 0 and 4, inclusive. Row 0 is the top row. | getRow(): ?string | setRow(?string row): void |
| `column` | `?string` | Optional | The column of the cell to clear. Always an integer between 0 and 4, inclusive. Column 0 is the leftmost column. | getColumn(): ?string | setColumn(?string column): void |

## Example (as JSON)

```json
{
  "row": "row0",
  "column": "column4"
}
```

