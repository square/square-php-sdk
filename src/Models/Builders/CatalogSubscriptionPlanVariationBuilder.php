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
     * Sets monthly billing anchor date field.
     */
    public function monthlyBillingAnchorDate(?int $value): self
    {
        $this->instance->setMonthlyBillingAnchorDate($value);
        return $this;
    }

    /**
     * Unsets monthly billing anchor date field.
     */
    public function unsetMonthlyBillingAnchorDate(): self
    {
        $this->instance->unsetMonthlyBillingAnchorDate();
        return $this;
    }

    /**
     * Sets can prorate field.
     */
    public function canProrate(?bool $value): self
    {
        $this->instance->setCanProrate($value);
        return $this;
    }

    /**
     * Unsets can prorate field.
     */
    public function unsetCanProrate(): self
    {
        $this->instance->unsetCanProrate();
        return $this;
    }

    /**
     * Sets successor plan variation id field.
     */
    public function successorPlanVariationId(?string $value): self
    {
        $this->instance->setSuccessorPlanVariationId($value);
        return $this;
    }

    /**
     * Unsets successor plan variation id field.
     */
    public function unsetSuccessorPlanVariationId(): self
    {
        $this->instance->unsetSuccessorPlanVariationId();
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
