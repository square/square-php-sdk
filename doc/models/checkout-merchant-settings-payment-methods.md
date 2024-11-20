
# Checkout Merchant Settings Payment Methods

## Structure

`CheckoutMerchantSettingsPaymentMethods`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `applePay` | [`?CheckoutMerchantSettingsPaymentMethodsPaymentMethod`](../../doc/models/checkout-merchant-settings-payment-methods-payment-method.md) | Optional | The settings allowed for a payment method. | getApplePay(): ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod | setApplePay(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod applePay): void |
| `googlePay` | [`?CheckoutMerchantSettingsPaymentMethodsPaymentMethod`](../../doc/models/checkout-merchant-settings-payment-methods-payment-method.md) | Optional | The settings allowed for a payment method. | getGooglePay(): ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod | setGooglePay(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod googlePay): void |
| `cashApp` | [`?CheckoutMerchantSettingsPaymentMethodsPaymentMethod`](../../doc/models/checkout-merchant-settings-payment-methods-payment-method.md) | Optional | The settings allowed for a payment method. | getCashApp(): ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod | setCashApp(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod cashApp): void |
| `afterpayClearpay` | [`?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay`](../../doc/models/checkout-merchant-settings-payment-methods-afterpay-clearpay.md) | Optional | The settings allowed for AfterpayClearpay. | getAfterpayClearpay(): ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay | setAfterpayClearpay(?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay afterpayClearpay): void |

## Example (as JSON)

```json
{
  "apple_pay": {
    "enabled": false
  },
  "google_pay": {
    "enabled": false
  },
  "cash_app": {
    "enabled": false
  },
  "afterpay_clearpay": {
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
}
```

