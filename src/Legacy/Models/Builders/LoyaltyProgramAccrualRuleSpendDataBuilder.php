<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyProgramAccrualRuleSpendData;
use Square\Legacy\Models\Money;

/**
 * Builder for model LoyaltyProgramAccrualRuleSpendData
 *
 * @see LoyaltyProgramAccrualRuleSpendData
 */
class LoyaltyProgramAccrualRuleSpendDataBuilder
{
    /**
     * @var LoyaltyProgramAccrualRuleSpendData
     */
    private $instance;

    private function __construct(LoyaltyProgramAccrualRuleSpendData $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Program Accrual Rule Spend Data Builder object.
     *
     * @param Money $amountMoney
     * @param string $taxMode
     */
    public static function init(Money $amountMoney, string $taxMode): self
    {
        return new self(new LoyaltyProgramAccrualRuleSpendData($amountMoney, $taxMode));
    }

    /**
     * Sets excluded category ids field.
     *
     * @param string[]|null $value
     */
    public function excludedCategoryIds(?array $value): self
    {
        $this->instance->setExcludedCategoryIds($value);
        return $this;
    }

    /**
     * Unsets excluded category ids field.
     */
    public function unsetExcludedCategoryIds(): self
    {
        $this->instance->unsetExcludedCategoryIds();
        return $this;
    }

    /**
     * Sets excluded item variation ids field.
     *
     * @param string[]|null $value
     */
    public function excludedItemVariationIds(?array $value): self
    {
        $this->instance->setExcludedItemVariationIds($value);
        return $this;
    }

    /**
     * Unsets excluded item variation ids field.
     */
    public function unsetExcludedItemVariationIds(): self
    {
        $this->instance->unsetExcludedItemVariationIds();
        return $this;
    }

    /**
     * Initializes a new Loyalty Program Accrual Rule Spend Data object.
     */
    public function build(): LoyaltyProgramAccrualRuleSpendData
    {
        return CoreHelper::clone($this->instance);
    }
}
