## Device Code

### Structure

`DeviceCode`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `?string` | Optional | The unique id for this device code. |
| `name` | `?string` | Optional | An optional user-defined name for the device code. |
| `code` | `?string` | Optional | The unique code that can be used to login. |
| `deviceId` | `?string` | Optional | The unique id of the device that used this code. Populated when the device is paired up. |
| `productType` | `string` |  | *Default: `'TERMINAL_API'`* |
| `locationId` | `?string` | Optional | The location assigned to this code. |
| `status` | [`?string (DeviceCodeStatus)`](/doc/models/device-code-status.md) | Optional | DeviceCode.Status enum. |
| `pairBy` | `?string` | Optional | When this DeviceCode will expire and no longer login. Timestamp in RFC 3339 format. |
| `createdAt` | `?string` | Optional | When this DeviceCode was created. Timestamp in RFC 3339 format. |
| `statusChangedAt` | `?string` | Optional | When this DeviceCode's status was last changed. Timestamp in RFC 3339 format. |
| `pairedAt` | `?string` | Optional | When this DeviceCode was paired. Timestamp in RFC 3339 format. |

### Example (as JSON)

```json
{
  "id": null,
  "name": null,
  "code": null,
  "device_id": null,
  "product_type": "product_type4",
  "location_id": null,
  "status": null,
  "pair_by": null,
  "created_at": null,
  "status_changed_at": null,
  "paired_at": null
}
```

