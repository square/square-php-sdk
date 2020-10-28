
# List Cash Drawer Shift Events Request

## Structure

`ListCashDrawerShiftEventsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `locationId` | `string` |  | The ID of the location to list cash drawer shifts for. | getLocationId(): string | setLocationId(string locationId): void |
| `limit` | `?int` | Optional | Number of resources to be returned in a page of results (200 by<br>default, 1000 max). | getLimit(): ?int | setLimit(?int limit): void |
| `cursor` | `?string` | Optional | Opaque cursor for fetching the next page of results. | getCursor(): ?string | setCursor(?string cursor): void |

## Example (as JSON)

```json
{
  "location_id": "location_id4",
  "limit": 172,
  "cursor": "cursor6"
}
```

