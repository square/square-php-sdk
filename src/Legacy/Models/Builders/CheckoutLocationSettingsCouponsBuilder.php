<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CheckoutLocationSettingsCoupons;

/**
 * Builder for model CheckoutLocationSettingsCoupons
 *
 * @see CheckoutLocationSettingsCoupons
 */
class CheckoutLocationSettingsCouponsBuilder
{
    /**
     * @var CheckoutLocationSettingsCoupons
     */
    private $instance;

    private function __construct(CheckoutLocationSettingsCoupons $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Checkout Location Settings Coupons Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutLocationSettingsCoupons());
    }

    /**
     * Sets enabled field.
     *
     * @param bool|null $value
     */
    public function enabled(?bool $value): self
    {
        $this->instance->setEnabled($value);
        return $this;
    }

    /**
     * Unsets enabled field.
     */
    public function unsetEnabled(): self
    {
        $this->instance->unsetEnabled();
        return $this;
    }

    /**
     * Initializes a new Checkout Location Settings Coupons object.
     */
    public function build(): CheckoutLocationSettingsCoupons
    {
        return CoreHelper::clone($this->instance);
    }
}
