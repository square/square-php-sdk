
# Terminal Device Checkout Options

## Structure

`TerminalDeviceCheckoutOptions`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `skipReceiptScreen` | `?bool` | Optional | Instructs the device to skip the receipt screen. Defaults to false. | getSkipReceiptScreen(): ?bool | setSkipReceiptScreen(?bool skipReceiptScreen): void |
| `tipSettings` | [`?TipSettings`](/doc/models/tip-settings.md) | Optional | - | getTipSettings(): ?TipSettings | setTipSettings(?TipSettings tipSettings): void |

## Example (as JSON)

```json
{
  "skip_receipt_screen": false,
  "tip_settings": {
    "allow_tipping": false,
    "separate_tip_screen": false,
    "custom_tip_field": false,
    "tip_percentages": [
      48
    ],
    "smart_tipping": false
  }
}
```

