## List Device Codes Request

### Structure

`ListDeviceCodesRequest`

### Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `cursor` | `?string` | Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for your original query.<br><br>See [Paginating results](#paginatingresults) for more information. | getCursor(): ?string | setCursor(?string cursor): void |
| `locationId` | `?string` | Optional | If specified, only returns DeviceCodes of the specified location.<br>Returns DeviceCodes of all locations if empty. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `productType` | [`?string (ProductType)`](/doc/models/product-type.md) | Optional | -  | getProductType(): ?string | setProductType(?string productType): void |

### Example (as JSON)

```json
{}
```

