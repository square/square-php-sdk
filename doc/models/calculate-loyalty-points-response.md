
# Calculate Loyalty Points Response

Represents a [CalculateLoyaltyPoints](../../doc/apis/loyalty.md#calculate-loyalty-points) response.

## Structure

`CalculateLoyaltyPointsResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `points` | `?int` | Optional | The number of points that the buyer can earn from the base loyalty program. | getPoints(): ?int | setPoints(?int points): void |
| `promotionPoints` | `?int` | Optional | The number of points that the buyer can earn from a loyalty promotion. To be eligible<br>to earn promotion points, the purchase must first qualify for program points. When `order_id`<br>is not provided in the request, this value is always 0. | getPromotionPoints(): ?int | setPromotionPoints(?int promotionPoints): void |

## Example (as JSON)

```json
{
  "points": 6,
  "promotion_points": 12,
  "errors": [
    {
      "category": "REFUND_ERROR",
      "code": "MERCHANT_SUBSCRIPTION_NOT_FOUND",
      "detail": "detail1",
      "field": "field9"
    },
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "BAD_REQUEST",
      "detail": "detail2",
      "field": "field0"
    },
    {
      "category": "EXTERNAL_VENDOR_ERROR",
      "code": "MISSING_REQUIRED_PARAMETER",
      "detail": "detail3",
      "field": "field1"
    }
  ]
}
```

