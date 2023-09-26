
# Device Component Details Battery Details

## Structure

`DeviceComponentDetailsBatteryDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `visiblePercent` | `?int` | Optional | The battery charge percentage as displayed on the device. | getVisiblePercent(): ?int | setVisiblePercent(?int visiblePercent): void |
| `externalPower` | [`?string(DeviceComponentDetailsExternalPower)`](../../doc/models/device-component-details-external-power.md) | Optional | An enum for ExternalPower. | getExternalPower(): ?string | setExternalPower(?string externalPower): void |

## Example (as JSON)

```json
{
  "visible_percent": 48,
  "external_power": "AVAILABLE_CHARGING"
}
```

