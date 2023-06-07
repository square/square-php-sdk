<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogSubscriptionPlan;

/**
 * Builder for model CatalogSubscriptionPlan
 *
 * @see CatalogSubscriptionPlan
 */
class CatalogSubscriptionPlanBuilder
{
    /**
     * @var CatalogSubscriptionPlan
     */
    private $instance;

    private function __construct(CatalogSubscriptionPlan $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new catalog subscription plan Builder object.
     */
    public static function init(string $name): self
    {
        return new self(new CatalogSubscriptionPlan($name));
    }

    /**
     * Sets phases field.
     */
    public function phases(?array $value): self
    {
        $this->instance->setPhases($value);
        return $this;
    }

    /**
     * Unsets phases field.
     */
    public function unsetPhases(): self
    {
        $this->instance->unsetPhases();
        return $this;
    }

    /**
     * Sets subscription plan variations field.
     */
    public function subscriptionPlanVariations(?array $value): self
    {
        $this->instance->setSubscriptionPlanVariations($value);
        return $this;
    }

    /**
     * Unsets subscription plan variations field.
     */
    public function unsetSubscriptionPlanVariations(): self
    {
        $this->instance->unsetSubscriptionPlanVariations();
        return $this;
    }

    /**
     * Sets eligible item ids field.
     */
    public function eligibleItemIds(?array $value): self
    {
        $this->instance->setEligibleItemIds($value);
        return $this;
    }

    /**
     * Unsets eligible item ids field.
     */
    public function unsetEligibleItemIds(): self
    {
        $this->instance->unsetEligibleItemIds();
        return $this;
    }

    /**
     * Sets eligible category ids field.
     */
    public function eligibleCategoryIds(?array $value): self
    {
        $this->instance->setEligibleCategoryIds($value);
        return $this;
    }

    /**
     * Unsets eligible category ids field.
     */
    public function unsetEligibleCategoryIds(): self
    {
        $this->instance->unsetEligibleCategoryIds();
        return $this;
    }

    /**
     * Sets all items field.
     */
    public function allItems(?bool $value): self
    {
        $this->instance->setAllItems($value);
        return $this;
    }

    /**
     * Unsets all items field.
     */
    public function unsetAllItems(): self
    {
        $this->instance->unsetAllItems();
        return $this;
    }

    /**
     * Initializes a new catalog subscription plan object.
     */
    public function build(): CatalogSubscriptionPlan
    {
        return CoreHelper::clone($this->instance);
    }
}
