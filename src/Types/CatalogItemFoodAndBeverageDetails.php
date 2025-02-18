<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The food and beverage-specific details of a `FOOD_AND_BEV` item.
 */
class CatalogItemFoodAndBeverageDetails extends JsonSerializableType
{
    /**
     * @var ?int $calorieCount The calorie count (in the unit of kcal) for the `FOOD_AND_BEV` type of items.
     */
    #[JsonProperty('calorie_count')]
    private ?int $calorieCount;

    /**
     * @var ?array<CatalogItemFoodAndBeverageDetailsDietaryPreference> $dietaryPreferences The dietary preferences for the `FOOD_AND_BEV` item.
     */
    #[JsonProperty('dietary_preferences'), ArrayType([CatalogItemFoodAndBeverageDetailsDietaryPreference::class])]
    private ?array $dietaryPreferences;

    /**
     * @var ?array<CatalogItemFoodAndBeverageDetailsIngredient> $ingredients The ingredients for the `FOOD_AND_BEV` type item.
     */
    #[JsonProperty('ingredients'), ArrayType([CatalogItemFoodAndBeverageDetailsIngredient::class])]
    private ?array $ingredients;

    /**
     * @param array{
     *   calorieCount?: ?int,
     *   dietaryPreferences?: ?array<CatalogItemFoodAndBeverageDetailsDietaryPreference>,
     *   ingredients?: ?array<CatalogItemFoodAndBeverageDetailsIngredient>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->calorieCount = $values['calorieCount'] ?? null;
        $this->dietaryPreferences = $values['dietaryPreferences'] ?? null;
        $this->ingredients = $values['ingredients'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getCalorieCount(): ?int
    {
        return $this->calorieCount;
    }

    /**
     * @param ?int $value
     */
    public function setCalorieCount(?int $value = null): self
    {
        $this->calorieCount = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogItemFoodAndBeverageDetailsDietaryPreference>
     */
    public function getDietaryPreferences(): ?array
    {
        return $this->dietaryPreferences;
    }

    /**
     * @param ?array<CatalogItemFoodAndBeverageDetailsDietaryPreference> $value
     */
    public function setDietaryPreferences(?array $value = null): self
    {
        $this->dietaryPreferences = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogItemFoodAndBeverageDetailsIngredient>
     */
    public function getIngredients(): ?array
    {
        return $this->ingredients;
    }

    /**
     * @param ?array<CatalogItemFoodAndBeverageDetailsIngredient> $value
     */
    public function setIngredients(?array $value = null): self
    {
        $this->ingredients = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
