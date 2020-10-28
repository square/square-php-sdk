
# V1 Item

V1Item

## Structure

`V1Item`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The item's ID. Must be unique among all entity IDs ever provided on behalf of the merchant. You can never reuse an ID. This value can include alphanumeric characters, dashes (-), and underscores (_). | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The item's name. | getName(): ?string | setName(?string name): void |
| `description` | `?string` | Optional | The item's description. | getDescription(): ?string | setDescription(?string description): void |
| `type` | [`?string (V1ItemType)`](/doc/models/v1-item-type.md) | Optional | - | getType(): ?string | setType(?string type): void |
| `color` | [`?string (V1ItemColor)`](/doc/models/v1-item-color.md) | Optional | - | getColor(): ?string | setColor(?string color): void |
| `abbreviation` | `?string` | Optional | The text of the item's display label in Square Point of Sale. Only up to the first five characters of the string are used. | getAbbreviation(): ?string | setAbbreviation(?string abbreviation): void |
| `visibility` | [`?string (V1ItemVisibility)`](/doc/models/v1-item-visibility.md) | Optional | - | getVisibility(): ?string | setVisibility(?string visibility): void |
| `availableOnline` | `?bool` | Optional | If true, the item can be added to shipping orders from the merchant's online store. | getAvailableOnline(): ?bool | setAvailableOnline(?bool availableOnline): void |
| `masterImage` | [`?V1ItemImage`](/doc/models/v1-item-image.md) | Optional | V1ItemImage | getMasterImage(): ?V1ItemImage | setMasterImage(?V1ItemImage masterImage): void |
| `category` | [`?V1Category`](/doc/models/v1-category.md) | Optional | V1Category | getCategory(): ?V1Category | setCategory(?V1Category category): void |
| `variations` | [`?(V1Variation[])`](/doc/models/v1-variation.md) | Optional | The item's variations. You must specify at least one variation. | getVariations(): ?array | setVariations(?array variations): void |
| `modifierLists` | [`?(V1ModifierList[])`](/doc/models/v1-modifier-list.md) | Optional | The modifier lists that apply to the item, if any. | getModifierLists(): ?array | setModifierLists(?array modifierLists): void |
| `fees` | [`?(V1Fee[])`](/doc/models/v1-fee.md) | Optional | The fees that apply to the item, if any. | getFees(): ?array | setFees(?array fees): void |
| `taxable` | `?bool` | Optional | Deprecated. This field is not used. | getTaxable(): ?bool | setTaxable(?bool taxable): void |
| `categoryId` | `?string` | Optional | The ID of the item's category, if any. | getCategoryId(): ?string | setCategoryId(?string categoryId): void |
| `availableForPickup` | `?bool` | Optional | If true, the item can be added to pickup orders from the merchant's online store. Default value: false | getAvailableForPickup(): ?bool | setAvailableForPickup(?bool availableForPickup): void |
| `v2Id` | `?string` | Optional | The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations share the same v2 ID. | getV2Id(): ?string | setV2Id(?string v2Id): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "description": "description0",
  "type": "OTHER",
  "color": "0b8000"
}
```

