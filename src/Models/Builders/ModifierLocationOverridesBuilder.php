<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ModifierLocationOverrides;
use Square\Models\Money;

/**
 * Builder for model ModifierLocationOverrides
 *
 * @see ModifierLocationOverrides
 */
class ModifierLocationOverridesBuilder
{
    /**
     * @var ModifierLocationOverrides
     */
    private $instance;

    private function __construct(ModifierLocationOverrides $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new modifier location overrides Builder object.
     */
    public static function init(): self
    {
        return new self(new ModifierLocationOverrides());
    }

    /**
     * Sets location id field.
     */
    public function locationId(?string $value): self
    {
        $this->instance->setLocationId($value);
        return $this;
    }

    /**
     * Unsets location id field.
     */
    public function unsetLocationId(): self
    {
        $this->instance->unsetLocationId();
        return $this;
    }

    /**
     * Sets price money field.
     */
    public function priceMoney(?Money $value): self
    {
        $this->instance->setPriceMoney($value);
        return $this;
    }

    /**
     * Sets sold out field.
     */
    public function soldOut(?bool $value): self
    {
        $this->instance->setSoldOut($value);
        return $this;
    }

    /**
     * Initializes a new modifier location overrides object.
     */
    public function build(): ModifierLocationOverrides
    {
        return CoreHelper::clone($this->instance);
    }
}
