
# Catalog Item Food and Beverage Details Ingredient

Describes the ingredient used in a `FOOD_AND_BEV` item.

## Structure

`CatalogItemFoodAndBeverageDetailsIngredient`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `type` | [`?string(CatalogItemFoodAndBeverageDetailsDietaryPreferenceType)`](../../doc/models/catalog-item-food-and-beverage-details-dietary-preference-type.md) | Optional | The type of dietary preference for the `FOOD_AND_BEV` type of items and integredients. | getType(): ?string | setType(?string type): void |
| `standardName` | [`?string(CatalogItemFoodAndBeverageDetailsIngredientStandardIngredient)`](../../doc/models/catalog-item-food-and-beverage-details-ingredient-standard-ingredient.md) | Optional | Standard ingredients for food and beverage items that are recommended on item creation. | getStandardName(): ?string | setStandardName(?string standardName): void |
| `customName` | `?string` | Optional | The name of a custom user-defined ingredient. This should be null if it's a standard dietary preference. | getCustomName(): ?string | setCustomName(?string customName): void |

## Example (as JSON)

```json
{
  "type": "STANDARD",
  "standard_name": "GLUTEN",
  "custom_name": "custom_name6"
}
```

