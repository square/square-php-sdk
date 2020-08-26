## Create Device Code Request

### Structure

`CreateDeviceCodeRequest`

### Fields

| Name | Type | Description | Getter | Setter |
|  --- | --- | --- | --- | --- |
| `idempotencyKey` | `string` | A unique string that identifies this CreateCheckout request. Keys can be any valid string but<br>must be unique for every CreateCheckout request.<br><br>See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more information. | getIdempotencyKey(): string | setIdempotencyKey(string idempotencyKey): void |
| `deviceCode` | [`DeviceCode`](/doc/models/device-code.md) | -  | getDeviceCode(): DeviceCode | setDeviceCode(DeviceCode deviceCode): void |

### Example (as JSON)

```json
{
  "idempotency_key": "01bb00a6-0c86-4770-94ed-f5fca973cd56",
  "device_code": {
    "name": "Counter 1",
    "location_id": "B5E4484SHHNYH",
    "product_type": "TERMINAL_API"
  }
}
```

