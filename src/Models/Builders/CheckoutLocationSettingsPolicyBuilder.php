<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutLocationSettingsPolicy;

/**
 * Builder for model CheckoutLocationSettingsPolicy
 *
 * @see CheckoutLocationSettingsPolicy
 */
class CheckoutLocationSettingsPolicyBuilder
{
    /**
     * @var CheckoutLocationSettingsPolicy
     */
    private $instance;

    private function __construct(CheckoutLocationSettingsPolicy $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new checkout location settings policy Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutLocationSettingsPolicy());
    }

    /**
     * Sets uid field.
     */
    public function uid(?string $value): self
    {
        $this->instance->setUid($value);
        return $this;
    }

    /**
     * Unsets uid field.
     */
    public function unsetUid(): self
    {
        $this->instance->unsetUid();
        return $this;
    }

    /**
     * Sets title field.
     */
    public function title(?string $value): self
    {
        $this->instance->setTitle($value);
        return $this;
    }

    /**
     * Unsets title field.
     */
    public function unsetTitle(): self
    {
        $this->instance->unsetTitle();
        return $this;
    }

    /**
     * Sets description field.
     */
    public function description(?string $value): self
    {
        $this->instance->setDescription($value);
        return $this;
    }

    /**
     * Unsets description field.
     */
    public function unsetDescription(): self
    {
        $this->instance->unsetDescription();
        return $this;
    }

    /**
     * Initializes a new checkout location settings policy object.
     */
    public function build(): CheckoutLocationSettingsPolicy
    {
        return CoreHelper::clone($this->instance);
    }
}
