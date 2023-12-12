<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutLocationSettingsTipping;
use Square\Models\Money;

/**
 * Builder for model CheckoutLocationSettingsTipping
 *
 * @see CheckoutLocationSettingsTipping
 */
class CheckoutLocationSettingsTippingBuilder
{
    /**
     * @var CheckoutLocationSettingsTipping
     */
    private $instance;

    private function __construct(CheckoutLocationSettingsTipping $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new checkout location settings tipping Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutLocationSettingsTipping());
    }

    /**
     * Sets percentages field.
     */
    public function percentages(?array $value): self
    {
        $this->instance->setPercentages($value);
        return $this;
    }

    /**
     * Unsets percentages field.
     */
    public function unsetPercentages(): self
    {
        $this->instance->unsetPercentages();
        return $this;
    }

    /**
     * Sets smart tipping enabled field.
     */
    public function smartTippingEnabled(?bool $value): self
    {
        $this->instance->setSmartTippingEnabled($value);
        return $this;
    }

    /**
     * Unsets smart tipping enabled field.
     */
    public function unsetSmartTippingEnabled(): self
    {
        $this->instance->unsetSmartTippingEnabled();
        return $this;
    }

    /**
     * Sets default percent field.
     */
    public function defaultPercent(?int $value): self
    {
        $this->instance->setDefaultPercent($value);
        return $this;
    }

    /**
     * Unsets default percent field.
     */
    public function unsetDefaultPercent(): self
    {
        $this->instance->unsetDefaultPercent();
        return $this;
    }

    /**
     * Sets smart tips field.
     */
    public function smartTips(?array $value): self
    {
        $this->instance->setSmartTips($value);
        return $this;
    }

    /**
     * Unsets smart tips field.
     */
    public function unsetSmartTips(): self
    {
        $this->instance->unsetSmartTips();
        return $this;
    }

    /**
     * Sets default smart tip field.
     */
    public function defaultSmartTip(?Money $value): self
    {
        $this->instance->setDefaultSmartTip($value);
        return $this;
    }

    /**
     * Initializes a new checkout location settings tipping object.
     */
    public function build(): CheckoutLocationSettingsTipping
    {
        return CoreHelper::clone($this->instance);
    }
}
