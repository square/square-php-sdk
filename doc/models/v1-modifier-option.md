
# V1 Modifier Option

V1ModifierOption

## Structure

`V1ModifierOption`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The modifier option's unique ID. | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The modifier option's name. | getName(): ?string | setName(?string name): void |
| `priceMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getPriceMoney(): ?V1Money | setPriceMoney(?V1Money priceMoney): void |
| `onByDefault` | `?bool` | Optional | If true, the modifier option is the default option in a modifier list for which selection_type is SINGLE. | getOnByDefault(): ?bool | setOnByDefault(?bool onByDefault): void |
| `ordinal` | `?int` | Optional | Indicates the modifier option's list position when displayed in Square Point of Sale and the merchant dashboard. If more than one modifier option in the same modifier list has the same ordinal value, those options are displayed in alphabetical order. | getOrdinal(): ?int | setOrdinal(?int ordinal): void |
| `modifierListId` | `?string` | Optional | The ID of the modifier list the option belongs to. | getModifierListId(): ?string | setModifierListId(?string modifierListId): void |
| `v2Id` | `?string` | Optional | The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations share the same v2 ID. | getV2Id(): ?string | setV2Id(?string v2Id): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "price_money": {
    "amount": 202,
    "currency_code": "XBB"
  },
  "on_by_default": false,
  "ordinal": 80
}
```

