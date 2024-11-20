
# Checkout Merchant Settings Payment Methods Afterpay Clearpay

The settings allowed for AfterpayClearpay.

## Structure

`CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `orderEligibilityRange` | [`?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange`](../../doc/models/checkout-merchant-settings-payment-methods-afterpay-clearpay-eligibility-range.md) | Optional | A range of purchase price that qualifies. | getOrderEligibilityRange(): ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange | setOrderEligibilityRange(?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange orderEligibilityRange): void |
| `itemEligibilityRange` | [`?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange`](../../doc/models/checkout-merchant-settings-payment-methods-afterpay-clearpay-eligibility-range.md) | Optional | A range of purchase price that qualifies. | getItemEligibilityRange(): ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange | setItemEligibilityRange(?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange itemEligibilityRange): void |
| `enabled` | `?bool` | Optional | Indicates whether the payment method is enabled for the account. | getEnabled(): ?bool | setEnabled(?bool enabled): void |

## Example (as JSON)

```json
{
  "order_eligibility_range": {
    "min": {
      "amount": 34,
      "currency": "OMR"
    },
    "max": {
      "amount": 140,
      "currency": "JPY"
    }
  },
  "item_eligibility_range": {
    "min": {
      "amount": 34,
      "currency": "OMR"
    },
    "max": {
      "amount": 140,
      "currency": "JPY"
    }
  },
  "enabled": false
}
```

