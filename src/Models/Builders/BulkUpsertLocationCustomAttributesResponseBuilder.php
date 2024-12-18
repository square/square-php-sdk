<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkUpsertLocationCustomAttributesResponse;
use Square\Models\BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse;
use Square\Models\Error;

/**
 * Builder for model BulkUpsertLocationCustomAttributesResponse
 *
 * @see BulkUpsertLocationCustomAttributesResponse
 */
class BulkUpsertLocationCustomAttributesResponseBuilder
{
    /**
     * @var BulkUpsertLocationCustomAttributesResponse
     */
    private $instance;

    private function __construct(BulkUpsertLocationCustomAttributesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Upsert Location Custom Attributes Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpsertLocationCustomAttributesResponse());
    }

    /**
     * Sets values field.
     *
     * @param array<string,BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse>|null $value
     */
    public function values(?array $value): self
    {
        $this->instance->setValues($value);
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
     * Initializes a new Bulk Upsert Location Custom Attributes Response object.
     */
    public function build(): BulkUpsertLocationCustomAttributesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
