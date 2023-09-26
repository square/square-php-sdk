
# Device Component Details Application Details

## Structure

`DeviceComponentDetailsApplicationDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `applicationType` | [`?string(ApplicationType)`](../../doc/models/application-type.md) | Optional | - | getApplicationType(): ?string | setApplicationType(?string applicationType): void |
| `version` | `?string` | Optional | The version of the application. | getVersion(): ?string | setVersion(?string version): void |
| `sessionLocation` | `?string` | Optional | The location_id of the session for the application. | getSessionLocation(): ?string | setSessionLocation(?string sessionLocation): void |
| `deviceCodeId` | `?string` | Optional | The id of the device code that was used to log in to the device. | getDeviceCodeId(): ?string | setDeviceCodeId(?string deviceCodeId): void |

## Example (as JSON)

```json
{
  "application_type": "TERMINAL_API",
  "version": "version4",
  "session_location": "session_location0",
  "device_code_id": "device_code_id2"
}
```

