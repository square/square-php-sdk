
# Tender Buy Now Pay Later Details

Represents the details of a tender with `type` `BUY_NOW_PAY_LATER`.

## Structure

`TenderBuyNowPayLaterDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `buyNowPayLaterBrand` | [`?string(TenderBuyNowPayLaterDetailsBrand)`](../../doc/models/tender-buy-now-pay-later-details-brand.md) | Optional | - | getBuyNowPayLaterBrand(): ?string | setBuyNowPayLaterBrand(?string buyNowPayLaterBrand): void |
| `status` | [`?string(TenderBuyNowPayLaterDetailsStatus)`](../../doc/models/tender-buy-now-pay-later-details-status.md) | Optional | - | getStatus(): ?string | setStatus(?string status): void |

## Example (as JSON)

```json
{
  "buy_now_pay_later_brand": "OTHER_BRAND",
  "status": "AUTHORIZED"
}
```

