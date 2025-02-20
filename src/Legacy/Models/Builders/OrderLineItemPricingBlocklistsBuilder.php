<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\OrderLineItemPricingBlocklists;
use Square\Legacy\Models\OrderLineItemPricingBlocklistsBlockedDiscount;
use Square\Legacy\Models\OrderLineItemPricingBlocklistsBlockedTax;

/**
 * Builder for model OrderLineItemPricingBlocklists
 *
 * @see OrderLineItemPricingBlocklists
 */
class OrderLineItemPricingBlocklistsBuilder
{
    /**
     * @var OrderLineItemPricingBlocklists
     */
    private $instance;

    private function __construct(OrderLineItemPricingBlocklists $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Order Line Item Pricing Blocklists Builder object.
     */
    public static function init(): self
    {
        return new self(new OrderLineItemPricingBlocklists());
    }

    /**
     * Sets blocked discounts field.
     *
     * @param OrderLineItemPricingBlocklistsBlockedDiscount[]|null $value
     */
    public function blockedDiscounts(?array $value): self
    {
        $this->instance->setBlockedDiscounts($value);
        return $this;
    }

    /**
     * Unsets blocked discounts field.
     */
    public function unsetBlockedDiscounts(): self
    {
        $this->instance->unsetBlockedDiscounts();
        return $this;
    }

    /**
     * Sets blocked taxes field.
     *
     * @param OrderLineItemPricingBlocklistsBlockedTax[]|null $value
     */
    public function blockedTaxes(?array $value): self
    {
        $this->instance->setBlockedTaxes($value);
        return $this;
    }

    /**
     * Unsets blocked taxes field.
     */
    public function unsetBlockedTaxes(): self
    {
        $this->instance->unsetBlockedTaxes();
        return $this;
    }

    /**
     * Initializes a new Order Line Item Pricing Blocklists object.
     */
    public function build(): OrderLineItemPricingBlocklists
    {
        return CoreHelper::clone($this->instance);
    }
}
