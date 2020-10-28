
# V1 Category

V1Category

## Structure

`V1Category`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The category's unique ID. | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The category's name. | getName(): ?string | setName(?string name): void |
| `v2Id` | `?string` | Optional | The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations share the same v2 ID. | getV2Id(): ?string | setV2Id(?string v2Id): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "v2_id": "v2_id2"
}
```

