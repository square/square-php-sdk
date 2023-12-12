<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutLocationSettingsCoupons;

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
     * Initializes a new checkout location settings coupons Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutLocationSettingsCoupons());
    }

    /**
     * Sets enabled field.
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
     * Initializes a new checkout location settings coupons object.
     */
    public function build(): CheckoutLocationSettingsCoupons
    {
        return CoreHelper::clone($this->instance);
    }
}
