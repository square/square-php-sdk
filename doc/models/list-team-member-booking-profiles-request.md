
# List Team Member Booking Profiles Request

## Structure

`ListTeamMemberBookingProfilesRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `bookableOnly` | `?bool` | Optional | Indicates whether to include only bookable team members in the returned result (`true`) or not (`false`). | getBookableOnly(): ?bool | setBookableOnly(?bool bookableOnly): void |
| `limit` | `?int` | Optional | The maximum number of results to return. | getLimit(): ?int | setLimit(?int limit): void |
| `cursor` | `?string` | Optional | The cursor for paginating through the results. | getCursor(): ?string | setCursor(?string cursor): void |
| `locationId` | `?string` | Optional | Indicates whether to include only team members enabled at the given location in the returned result. | getLocationId(): ?string | setLocationId(?string locationId): void |

## Example (as JSON)

```json
{
  "bookable_only": false,
  "limit": 172,
  "cursor": "cursor6",
  "location_id": "location_id4"
}
```

