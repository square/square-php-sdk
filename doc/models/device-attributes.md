
# Device Attributes

## Structure

`DeviceAttributes`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `type` | `string` | Required, Constant | An enum identifier of the device type.<br>**Default**: `'TERMINAL'` | getType(): string | setType(string type): void |
| `manufacturer` | `string` | Required | The maker of the device. | getManufacturer(): string | setManufacturer(string manufacturer): void |
| `model` | `?string` | Optional | The specific model of the device. | getModel(): ?string | setModel(?string model): void |
| `name` | `?string` | Optional | A seller-specified name for the device. | getName(): ?string | setName(?string name): void |
| `manufacturersId` | `?string` | Optional | The manufacturer-supplied identifier for the device (where available). In many cases,<br>this identifier will be a serial number. | getManufacturersId(): ?string | setManufacturersId(?string manufacturersId): void |
| `updatedAt` | `?string` | Optional | The RFC 3339-formatted value of the most recent update to the device information.<br>(Could represent any field update on the device.) | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `version` | `?string` | Optional | The current version of software installed on the device. | getVersion(): ?string | setVersion(?string version): void |
| `merchantToken` | `?string` | Optional | The merchant_token identifying the merchant controlling the device. | getMerchantToken(): ?string | setMerchantToken(?string merchantToken): void |

## Example (as JSON)

```json
{
  "type": "TERMINAL",
  "manufacturer": "manufacturer0",
  "model": "model4",
  "name": "name6",
  "manufacturers_id": "manufacturers_id2",
  "updated_at": "updated_at2",
  "version": "version2"
}
```

