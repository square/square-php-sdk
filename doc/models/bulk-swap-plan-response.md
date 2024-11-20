
# Bulk Swap Plan Response

Defines output parameters in a response of the
[BulkSwapPlan](../../doc/apis/subscriptions.md#bulk-swap-plan) endpoint.

## Structure

`BulkSwapPlanResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Errors encountered during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `affectedSubscriptions` | `?int` | Optional | The number of affected subscriptions. | getAffectedSubscriptions(): ?int | setAffectedSubscriptions(?int affectedSubscriptions): void |

## Example (as JSON)

```json
{
  "affected_subscriptions": 12,
  "errors": [
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    },
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    }
  ]
}
```

