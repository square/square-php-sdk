
# Calculate Loyalty Points Response

A response that includes the points that the buyer can earn from
a specified purchase.

## Structure

`CalculateLoyaltyPointsResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `points` | `?int` | Optional | The points that the buyer can earn from a specified purchase. | getPoints(): ?int | setPoints(?int points): void |

## Example (as JSON)

```json
{
  "points": 6
}
```

