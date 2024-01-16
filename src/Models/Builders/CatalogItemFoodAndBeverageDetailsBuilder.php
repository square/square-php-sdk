<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogItemFoodAndBeverageDetails;

/**
 * Builder for model CatalogItemFoodAndBeverageDetails
 *
 * @see CatalogItemFoodAndBeverageDetails
 */
class CatalogItemFoodAndBeverageDetailsBuilder
{
    /**
     * @var CatalogItemFoodAndBeverageDetails
     */
    private $instance;

    private function __construct(CatalogItemFoodAndBeverageDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new catalog item food and beverage details Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogItemFoodAndBeverageDetails());
    }

    /**
     * Sets calorie count field.
     */
    public function calorieCount(?int $value): self
    {
        $this->instance->setCalorieCount($value);
        return $this;
    }

    /**
     * Unsets calorie count field.
     */
    public function unsetCalorieCount(): self
    {
        $this->instance->unsetCalorieCount();
        return $this;
    }

    /**
     * Sets dietary preferences field.
     */
    public function dietaryPreferences(?array $value): self
    {
        $this->instance->setDietaryPreferences($value);
        return $this;
    }

    /**
     * Unsets dietary preferences field.
     */
    public function unsetDietaryPreferences(): self
    {
        $this->instance->unsetDietaryPreferences();
        return $this;
    }

    /**
     * Sets ingredients field.
     */
    public function ingredients(?array $value): self
    {
        $this->instance->setIngredients($value);
        return $this;
    }

    /**
     * Unsets ingredients field.
     */
    public function unsetIngredients(): self
    {
        $this->instance->unsetIngredients();
        return $this;
    }

    /**
     * Initializes a new catalog item food and beverage details object.
     */
    public function build(): CatalogItemFoodAndBeverageDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
