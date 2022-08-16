
# Create Payment Link Response

## Structure

`CreatePaymentLinkResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `paymentLink` | [`?PaymentLink`](../../doc/models/payment-link.md) | Optional | - | getPaymentLink(): ?PaymentLink | setPaymentLink(?PaymentLink paymentLink): void |
| `relatedResources` | [`?PaymentLinkRelatedResources`](../../doc/models/payment-link-related-resources.md) | Optional | - | getRelatedResources(): ?PaymentLinkRelatedResources | setRelatedResources(?PaymentLinkRelatedResources relatedResources): void |

## Example (as JSON)

```json
{
  "errors": null,
  "payment_link": null,
  "related_resources": null
}
```

