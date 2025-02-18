<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\MeasurementUnit;
use Square\Legacy\Models\OrderQuantityUnit;

/**
 * Builder for model OrderQuantityUnit
 *
 * @see OrderQuantityUnit
 */
class OrderQuantityUnitBuilder
{
    /**
     * @var OrderQuantityUnit
     */
    private $instance;

    private function __construct(OrderQuantityUnit $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Order Quantity Unit Builder object.
     */
    public static function init(): self
    {
        return new self(new OrderQuantityUnit());
    }

    /**
     * Sets measurement unit field.
     *
     * @param MeasurementUnit|null $value
     */
    public function measurementUnit(?MeasurementUnit $value): self
    {
        $this->instance->setMeasurementUnit($value);
        return $this;
    }

    /**
     * Sets precision field.
     *
     * @param int|null $value
     */
    public function precision(?int $value): self
    {
        $this->instance->setPrecision($value);
        return $this;
    }

    /**
     * Unsets precision field.
     */
    public function unsetPrecision(): self
    {
        $this->instance->unsetPrecision();
        return $this;
    }

    /**
     * Sets catalog object id field.
     *
     * @param string|null $value
     */
    public function catalogObjectId(?string $value): self
    {
        $this->instance->setCatalogObjectId($value);
        return $this;
    }

    /**
     * Unsets catalog object id field.
     */
    public function unsetCatalogObjectId(): self
    {
        $this->instance->unsetCatalogObjectId();
        return $this;
    }

    /**
     * Sets catalog version field.
     *
     * @param int|null $value
     */
    public function catalogVersion(?int $value): self
    {
        $this->instance->setCatalogVersion($value);
        return $this;
    }

    /**
     * Unsets catalog version field.
     */
    public function unsetCatalogVersion(): self
    {
        $this->instance->unsetCatalogVersion();
        return $this;
    }

    /**
     * Initializes a new Order Quantity Unit object.
     */
    public function build(): OrderQuantityUnit
    {
        return CoreHelper::clone($this->instance);
    }
}
