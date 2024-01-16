
# Catalog Item Food and Beverage Details

The food and beverage-specific details of a `FOOD_AND_BEV` item.

## Structure

`CatalogItemFoodAndBeverageDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `calorieCount` | `?int` | Optional | The calorie count (in the unit of kcal) for the `FOOD_AND_BEV` type of items. | getCalorieCount(): ?int | setCalorieCount(?int calorieCount): void |
| `dietaryPreferences` | [`?(CatalogItemFoodAndBeverageDetailsDietaryPreference[])`](../../doc/models/catalog-item-food-and-beverage-details-dietary-preference.md) | Optional | The dietary preferences for the `FOOD_AND_BEV` item. | getDietaryPreferences(): ?array | setDietaryPreferences(?array dietaryPreferences): void |
| `ingredients` | [`?(CatalogItemFoodAndBeverageDetailsIngredient[])`](../../doc/models/catalog-item-food-and-beverage-details-ingredient.md) | Optional | The ingredients for the `FOOD_AND_BEV` type item. | getIngredients(): ?array | setIngredients(?array ingredients): void |

## Example (as JSON)

```json
{
  "calorie_count": 36,
  "dietary_preferences": [
    {
      "type": "STANDARD",
      "standard_name": "VEGETARIAN",
      "custom_name": "custom_name8"
    }
  ],
  "ingredients": [
    {
      "type": "STANDARD",
      "standard_name": "MILK",
      "custom_name": "custom_name8"
    },
    {
      "type": "STANDARD",
      "standard_name": "MILK",
      "custom_name": "custom_name8"
    }
  ]
}
```

