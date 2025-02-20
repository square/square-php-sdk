<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\ModifierLocationOverrides;
use Square\Legacy\Models\Money;

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
     * Initializes a new Modifier Location Overrides Builder object.
     */
    public static function init(): self
    {
        return new self(new ModifierLocationOverrides());
    }

    /**
     * Sets location id field.
     *
     * @param string|null $value
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
     *
     * @param Money|null $value
     */
    public function priceMoney(?Money $value): self
    {
        $this->instance->setPriceMoney($value);
        return $this;
    }

    /**
     * Sets sold out field.
     *
     * @param bool|null $value
     */
    public function soldOut(?bool $value): self
    {
        $this->instance->setSoldOut($value);
        return $this;
    }

    /**
     * Initializes a new Modifier Location Overrides object.
     */
    public function build(): ModifierLocationOverrides
    {
        return CoreHelper::clone($this->instance);
    }
}
