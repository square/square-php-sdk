
# Payment Link Related Resources

## Structure

`PaymentLinkRelatedResources`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `orders` | [`?(Order[])`](../../doc/models/order.md) | Optional | The order associated with the payment link. | getOrders(): ?array | setOrders(?array orders): void |
| `subscriptionPlans` | [`?(CatalogObject[])`](../../doc/models/catalog-object.md) | Optional | The subscription plan associated with the payment link. | getSubscriptionPlans(): ?array | setSubscriptionPlans(?array subscriptionPlans): void |

## Example (as JSON)

```json
{
  "orders": null,
  "subscription_plans": null
}
```

