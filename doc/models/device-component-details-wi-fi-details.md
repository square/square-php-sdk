
# Device Component Details Wi Fi Details

## Structure

`DeviceComponentDetailsWiFiDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `active` | `?bool` | Optional | A boolean to represent whether the WiFI interface is currently active. | getActive(): ?bool | setActive(?bool active): void |
| `ssid` | `?string` | Optional | The name of the connected WIFI network. | getSsid(): ?string | setSsid(?string ssid): void |
| `ipAddressV4` | `?string` | Optional | The string representation of the device’s IPv4 address. | getIpAddressV4(): ?string | setIpAddressV4(?string ipAddressV4): void |
| `secureConnection` | `?string` | Optional | The security protocol for a secure connection (e.g. WPA2). None provided if the connection<br>is unsecured. | getSecureConnection(): ?string | setSecureConnection(?string secureConnection): void |
| `signalStrength` | [`?DeviceComponentDetailsMeasurement`](../../doc/models/device-component-details-measurement.md) | Optional | A value qualified by unit of measure. | getSignalStrength(): ?DeviceComponentDetailsMeasurement | setSignalStrength(?DeviceComponentDetailsMeasurement signalStrength): void |

## Example (as JSON)

```json
{
  "active": false,
  "ssid": "ssid6",
  "ip_address_v4": "ip_address_v40",
  "secure_connection": "secure_connection6",
  "signal_strength": {
    "value": 222
  }
}
```

