
# Destination Details

Details about a refund's destination.

## Structure

`DestinationDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `cardDetails` | [`?DestinationDetailsCardRefundDetails`](../../doc/models/destination-details-card-refund-details.md) | Optional | - | getCardDetails(): ?DestinationDetailsCardRefundDetails | setCardDetails(?DestinationDetailsCardRefundDetails cardDetails): void |

## Example (as JSON)

```json
{
  "card_details": {
    "card": {
      "id": "id6",
      "card_brand": "OTHER_BRAND",
      "last_4": "last_48",
      "exp_month": 228,
      "exp_year": 68
    },
    "entry_method": "entry_method8"
  }
}
```

