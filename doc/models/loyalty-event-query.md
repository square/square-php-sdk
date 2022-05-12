
# Loyalty Event Query

Represents a query used to search for loyalty events.

## Structure

`LoyaltyEventQuery`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `filter` | [`?LoyaltyEventFilter`](../../doc/models/loyalty-event-filter.md) | Optional | The filtering criteria. If the request specifies multiple filters,<br>the endpoint uses a logical AND to evaluate them. | getFilter(): ?LoyaltyEventFilter | setFilter(?LoyaltyEventFilter filter): void |

## Example (as JSON)

```json
{
  "filter": null
}
```

