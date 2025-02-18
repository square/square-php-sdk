<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkDeleteOrderCustomAttributesResponse;
use Square\Legacy\Models\DeleteOrderCustomAttributeResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model BulkDeleteOrderCustomAttributesResponse
 *
 * @see BulkDeleteOrderCustomAttributesResponse
 */
class BulkDeleteOrderCustomAttributesResponseBuilder
{
    /**
     * @var BulkDeleteOrderCustomAttributesResponse
     */
    private $instance;

    private function __construct(BulkDeleteOrderCustomAttributesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Delete Order Custom Attributes Response Builder object.
     *
     * @param array<string,DeleteOrderCustomAttributeResponse> $values
     */
    public static function init(array $values): self
    {
        return new self(new BulkDeleteOrderCustomAttributesResponse($values));
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
     * Initializes a new Bulk Delete Order Custom Attributes Response object.
     */
    public function build(): BulkDeleteOrderCustomAttributesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
