<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogInfoResponse;
use Square\Legacy\Models\CatalogInfoResponseLimits;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\StandardUnitDescriptionGroup;

/**
 * Builder for model CatalogInfoResponse
 *
 * @see CatalogInfoResponse
 */
class CatalogInfoResponseBuilder
{
    /**
     * @var CatalogInfoResponse
     */
    private $instance;

    private function __construct(CatalogInfoResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Info Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogInfoResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets limits field.
     *
     * @param CatalogInfoResponseLimits|null $value
     */
    public function limits(?CatalogInfoResponseLimits $value): self
    {
        $this->instance->setLimits($value);
        return $this;
    }

    /**
     * Sets standard unit description group field.
     *
     * @param StandardUnitDescriptionGroup|null $value
     */
    public function standardUnitDescriptionGroup(?StandardUnitDescriptionGroup $value): self
    {
        $this->instance->setStandardUnitDescriptionGroup($value);
        return $this;
    }

    /**
     * Initializes a new Catalog Info Response object.
     */
    public function build(): CatalogInfoResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
