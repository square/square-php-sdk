
# Pagination Cursor

Used *internally* to encapsulate pagination details. The resulting proto will be base62 encoded
in order to produce a cursor that can be used externally.

## Structure

`PaginationCursor`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `orderValue` | `?string` | Optional | The ID of the last resource in the current page. The page can be in an ascending or<br>descending order | getOrderValue(): ?string | setOrderValue(?string orderValue): void |

## Example (as JSON)

```json
{
  "order_value": "order_value4"
}
```

