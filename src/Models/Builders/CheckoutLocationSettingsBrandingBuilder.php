<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutLocationSettingsBranding;

/**
 * Builder for model CheckoutLocationSettingsBranding
 *
 * @see CheckoutLocationSettingsBranding
 */
class CheckoutLocationSettingsBrandingBuilder
{
    /**
     * @var CheckoutLocationSettingsBranding
     */
    private $instance;

    private function __construct(CheckoutLocationSettingsBranding $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new checkout location settings branding Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutLocationSettingsBranding());
    }

    /**
     * Sets header type field.
     */
    public function headerType(?string $value): self
    {
        $this->instance->setHeaderType($value);
        return $this;
    }

    /**
     * Sets button color field.
     */
    public function buttonColor(?string $value): self
    {
        $this->instance->setButtonColor($value);
        return $this;
    }

    /**
     * Unsets button color field.
     */
    public function unsetButtonColor(): self
    {
        $this->instance->unsetButtonColor();
        return $this;
    }

    /**
     * Sets button shape field.
     */
    public function buttonShape(?string $value): self
    {
        $this->instance->setButtonShape($value);
        return $this;
    }

    /**
     * Initializes a new checkout location settings branding object.
     */
    public function build(): CheckoutLocationSettingsBranding
    {
        return CoreHelper::clone($this->instance);
    }
}
