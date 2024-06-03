
# Event Data

## Structure

`EventData`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `type` | `?string` | Optional | The name of the affected object’s type. | getType(): ?string | setType(?string type): void |
| `id` | `?string` | Optional | The ID of the affected object. | getId(): ?string | setId(?string id): void |
| `deleted` | `?bool` | Optional | This is true if the affected object has been deleted; otherwise, it's absent. | getDeleted(): ?bool | setDeleted(?bool deleted): void |
| `object` | `mixed` | Optional | An object containing fields and values relevant to the event. It is absent if the affected object has been deleted. | getObject(): | setObject( object): void |

## Example (as JSON)

```json
{
  "type": "type2",
  "id": "id8",
  "deleted": false,
  "object": {
    "key1": "val1",
    "key2": "val2"
  }
}
```

