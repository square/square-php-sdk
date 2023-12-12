
# Catalog Object Category

A category that can be assigned to an item or a parent category that can be assigned
to another category. For example, a clothing category can be assigned to a t-shirt item or
be made as the parent category to the pants category.

## Structure

`CatalogObjectCategory`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The ID of the object's category. | getId(): ?string | setId(?string id): void |
| `ordinal` | `?int` | Optional | The order of the object within the context of the category. | getOrdinal(): ?int | setOrdinal(?int ordinal): void |

## Example (as JSON)

```json
{
  "id": "id4",
  "ordinal": 8
}
```

