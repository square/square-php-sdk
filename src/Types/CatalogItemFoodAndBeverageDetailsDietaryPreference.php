<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Dietary preferences that can be assigned to an `FOOD_AND_BEV` item and its ingredients.
 */
class CatalogItemFoodAndBeverageDetailsDietaryPreference extends JsonSerializableType
{
    /**
     * The dietary preference type. Supported values include `STANDARD` and `CUSTOM` as specified in `FoodAndBeverageDetails.DietaryPreferenceType`.
     * See [DietaryPreferenceType](#type-dietarypreferencetype) for possible values
     *
     * @var ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * The name of the dietary preference from a standard pre-defined list. This should be null if it's a custom dietary preference.
     * See [StandardDietaryPreference](#type-standarddietarypreference) for possible values
     *
     * @var ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceStandardDietaryPreference> $standardName
     */
    #[JsonProperty('standard_name')]
    private ?string $standardName;

    /**
     * @var ?string $customName The name of a user-defined custom dietary preference. This should be null if it's a standard dietary preference.
     */
    #[JsonProperty('custom_name')]
    private ?string $customName;

    /**
     * @param array{
     *   type?: ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceType>,
     *   standardName?: ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceStandardDietaryPreference>,
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
     * @return ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceStandardDietaryPreference>
     */
    public function getStandardName(): ?string
    {
        return $this->standardName;
    }

    /**
     * @param ?value-of<CatalogItemFoodAndBeverageDetailsDietaryPreferenceStandardDietaryPreference> $value
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
