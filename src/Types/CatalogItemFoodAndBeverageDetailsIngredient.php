<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes the ingredient used in a `FOOD_AND_BEV` item.
 */
class CatalogItemFoodAndBeverageDetailsIngredient extends JsonSerializableType
{
    /**
     * The dietary preference type of the ingredient. Supported values include `STANDARD` and `CUSTOM` as specified in `FoodAndBeverageDetails.DietaryPreferenceType`.
     * See [DietaryPreferenceType](#type-dietarypreferencetype) for possible values
     *
     * @var ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * The name of the ingredient from a standard pre-defined list. This should be null if it's a custom dietary preference.
     * See [StandardIngredient](#type-standardingredient) for possible values
     *
     * @var ?value-of<CatalogItemFoodAndBeverageDetailsIngredientStandardIngredient> $standardName
     */
    #[JsonProperty('standard_name')]
    private ?string $standardName;

    /**
     * @var ?string $customName The name of a custom user-defined ingredient. This should be null if it's a standard dietary preference.
     */
    #[JsonProperty('custom_name')]
    private ?string $customName;

    /**
     * @param array{
     *   type?: ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceType>,
     *   standardName?: ?value-of<CatalogItemFoodAndBeverageDetailsIngredientStandardIngredient>,
     *   customName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->standardName = $values['standardName'] ?? null;
        $this->customName = $values['customName'] ?? null;
    }

    /**
     * @return ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogItemFoodAndBeverageDetailsIngredientStandardIngredient>
     */
    public function getStandardName(): ?string
    {
        return $this->standardName;
    }

    /**
     * @param ?value-of<CatalogItemFoodAndBeverageDetailsIngredientStandardIngredient> $value
     */
    public function setStandardName(?string $value = null): self
    {
        $this->standardName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCustomName(): ?string
    {
        return $this->customName;
    }

    /**
     * @param ?string $value
     */
    public function setCustomName(?string $value = null): self
    {
        $this->customName = $value;
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
