## Create Catalog Image Request

### Structure

`CreateCatalogImageRequest`

### Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `string` |  | A unique string that identifies this CreateCatalogImage request.<br>Keys can be any valid string but must be unique for every CreateCatalogImage request.<br><br>See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more information. | getIdempotencyKey(): string | setIdempotencyKey(string idempotencyKey): void |
| `objectId` | `?string` | Optional | Unique ID of the `CatalogObject` to attach to this `CatalogImage`. Leave this<br>field empty to create unattached images, for example if you are building an integration<br>where these images can be attached to catalog items at a later time. | getObjectId(): ?string | setObjectId(?string objectId): void |
| `image` | [`?CatalogObject`](/doc/models/catalog-object.md) | Optional | -  | getImage(): ?CatalogObject | setImage(?CatalogObject image): void |

### Example (as JSON)

```json
{
  "idempotency_key": "528dea59-7bfb-43c1-bd48-4a6bba7dd61f86",
  "object_id": "ND6EA5AAJEO5WL3JNNIAQA32",
  "image": {
    "id": "#TEMP_ID",
    "type": "IMAGE",
    "image_data": {
      "caption": "A picture of a cup of coffee"
    }
  }
}
```

