<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogItemFoodAndBeverageDetailsIngredient;

/**
 * Builder for model CatalogItemFoodAndBeverageDetailsIngredient
 *
 * @see CatalogItemFoodAndBeverageDetailsIngredient
 */
class CatalogItemFoodAndBeverageDetailsIngredientBuilder
{
    /**
     * @var CatalogItemFoodAndBeverageDetailsIngredient
     */
    private $instance;

    private function __construct(CatalogItemFoodAndBeverageDetailsIngredient $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new catalog item food and beverage details ingredient Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogItemFoodAndBeverageDetailsIngredient());
    }

    /**
     * Sets type field.
     */
    public function type(?string $value): self
    {
        $this->instance->setType($value);
        return $this;
    }

    /**
     * Sets standard name field.
     */
    public function standardName(?string $value): self
    {
        $this->instance->setStandardName($value);
        return $this;
    }

    /**
     * Sets custom name field.
     */
    public function customName(?string $value): self
    {
        $this->instance->setCustomName($value);
        return $this;
    }

    /**
     * Unsets custom name field.
     */
    public function unsetCustomName(): self
    {
        $this->instance->unsetCustomName();
        return $this;
    }

    /**
     * Initializes a new catalog item food and beverage details ingredient object.
     */
    public function build(): CatalogItemFoodAndBeverageDetailsIngredient
    {
        return CoreHelper::clone($this->instance);
    }
}
