<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\UpdateItemTaxesResponse;

/**
 * Builder for model UpdateItemTaxesResponse
 *
 * @see UpdateItemTaxesResponse
 */
class UpdateItemTaxesResponseBuilder
{
    /**
     * @var UpdateItemTaxesResponse
     */
    private $instance;

    private function __construct(UpdateItemTaxesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Item Taxes Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateItemTaxesResponse());
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
     * Sets updated at field.
     *
     * @param string|null $value
     */
    public function updatedAt(?string $value): self
    {
        $this->instance->setUpdatedAt($value);
        return $this;
    }

    /**
     * Initializes a new Update Item Taxes Response object.
     */
    public function build(): UpdateItemTaxesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
