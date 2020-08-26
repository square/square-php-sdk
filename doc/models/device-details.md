## Device Details

Details about the device that took the payment.

### Structure

`DeviceDetails`

### Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `deviceId` | `?string` | Optional | Square-issued ID of the device. | getDeviceId(): ?string | setDeviceId(?string deviceId): void |
| `deviceName` | `?string` | Optional | The name of the device set by the merchant. | getDeviceName(): ?string | setDeviceName(?string deviceName): void |

### Example (as JSON)

```json
{
  "device_id": "device_id6",
  "device_name": "device_name2"
}
```

