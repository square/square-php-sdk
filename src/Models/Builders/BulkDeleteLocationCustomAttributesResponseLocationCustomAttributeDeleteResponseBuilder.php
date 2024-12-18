<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse;
use Square\Models\Error;

/**
 * Builder for model BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse
 *
 * @see BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse
 */
class BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponseBuilder
{
    /**
     * @var BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse
     */
    private $instance;

    private function __construct(
        BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse $instance
    ) {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Delete Location Custom Attributes Response Location Custom Attribute Delete
     * Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse());
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
     * Initializes a new Bulk Delete Location Custom Attributes Response Location Custom Attribute Delete
     * Response object.
     */
    public function build(): BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
