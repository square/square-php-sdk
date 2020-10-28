
# List Invoices Request

Describes a `ListInvoice` request.

## Structure

`ListInvoicesRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `locationId` | `string` |  | The ID of the location for which to list invoices. | getLocationId(): string | setLocationId(string locationId): void |
| `cursor` | `?string` | Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this cursor to retrieve the next set of results for your original query.<br><br>For more information, see [Pagination](https://developer.squareup.com/docs/docs/working-with-apis/pagination). | getCursor(): ?string | setCursor(?string cursor): void |
| `limit` | `?int` | Optional | The maximum number of invoices to return (200 is the maximum `limit`).<br>If not provided, the server<br>uses a default limit of 100 invoices. | getLimit(): ?int | setLimit(?int limit): void |

## Example (as JSON)

```json
{
  "location_id": "location_id4",
  "cursor": "cursor6",
  "limit": 172
}
```

