
# Retrieve Subscription Request

Defines input parameters in a request to the
[RetrieveSubscription](../../doc/apis/subscriptions.md#retrieve-subscription) endpoint.

## Structure

`RetrieveSubscriptionRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `mInclude` | `?string` | Optional | A query parameter to specify related information to be included in the response.<br><br>The supported query parameter values are:<br><br>- `actions`: to include scheduled actions on the targeted subscription. | getMInclude(): ?string | setMInclude(?string mInclude): void |

## Example (as JSON)

```json
{
  "include": "include2"
}
```

