## Device Checkout Options

### Structure

`DeviceCheckoutOptions`

### Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `deviceId` | `string` |  | The unique Id of the device intended for this `TerminalCheckout`.<br>The Id can be retrieved from /v2/devices api. | getDeviceId(): string | setDeviceId(string deviceId): void |
| `skipReceiptScreen` | `?bool` | Optional | Instruct the device to skip the receipt screen. Defaults to false. | getSkipReceiptScreen(): ?bool | setSkipReceiptScreen(?bool skipReceiptScreen): void |
| `tipSettings` | [`?TipSettings`](/doc/models/tip-settings.md) | Optional | -  | getTipSettings(): ?TipSettings | setTipSettings(?TipSettings tipSettings): void |

### Example (as JSON)

```json
{
  "device_id": "device_id6",
  "skip_receipt_screen": false,
  "tip_settings": {
    "allow_tipping": false,
    "separate_tip_screen": false,
    "custom_tip_field": false
  }
}
```

