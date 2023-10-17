
# Change Billing Anchor Date Request

Defines input parameters in a request to the
[ChangeBillingAnchorDate](../../doc/apis/subscriptions.md#change-billing-anchor-date) endpoint.

## Structure

`ChangeBillingAnchorDateRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `monthlyBillingAnchorDate` | `?int` | Optional | The anchor day for the billing cycle.<br>**Constraints**: `>= 1`, `<= 31` | getMonthlyBillingAnchorDate(): ?int | setMonthlyBillingAnchorDate(?int monthlyBillingAnchorDate): void |
| `effectiveDate` | `?string` | Optional | The `YYYY-MM-DD`-formatted date when the scheduled `BILLING_ANCHOR_CHANGE` action takes<br>place on the subscription.<br><br>When this date is unspecified or falls within the current billing cycle, the billing anchor date<br>is changed immediately. | getEffectiveDate(): ?string | setEffectiveDate(?string effectiveDate): void |

## Example (as JSON)

```json
{
  "monthly_billing_anchor_date": 1,
  "effective_date": "effective_date8"
}
```

