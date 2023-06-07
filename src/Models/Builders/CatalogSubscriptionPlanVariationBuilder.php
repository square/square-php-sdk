<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogSubscriptionPlanVariation;

/**
 * Builder for model CatalogSubscriptionPlanVariation
 *
 * @see CatalogSubscriptionPlanVariation
 */
class CatalogSubscriptionPlanVariationBuilder
{
    /**
     * @var CatalogSubscriptionPlanVariation
     */
    private $instance;

    private function __construct(CatalogSubscriptionPlanVariation $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new catalog subscription plan variation Builder object.
     */
    public static function init(string $name, array $phases): self
    {
        return new self(new CatalogSubscriptionPlanVariation($name, $phases));
    }

    /**
     * Sets subscription plan id field.
     */
    public function subscriptionPlanId(?string $value): self
    {
        $this->instance->setSubscriptionPlanId($value);
        return $this;
    }

    /**
     * Unsets subscription plan id field.
     */
    public function unsetSubscriptionPlanId(): self
    {
        $this->instance->unsetSubscriptionPlanId();
        return $this;
    }

    /**
     * Initializes a new catalog subscription plan variation object.
     */
    public function build(): CatalogSubscriptionPlanVariation
    {
        return CoreHelper::clone($this->instance);
    }
}
