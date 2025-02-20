<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse;
use Square\Legacy\Models\CustomAttribute;
use Square\Legacy\Models\Error;

/**
 * Builder for model BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse
 *
 * @see BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse
 */
class BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponseBuilder
{
    /**
     * @var BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse
     */
    private $instance;

    private function __construct(
        BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse $instance
    ) {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Bulk Upsert Customer Custom Attributes Response Customer Custom Attribute Upsert
     * Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse());
    }

    /**
     * Sets customer id field.
     *
     * @param string|null $value
     */
    public function customerId(?string $value): self
    {
        $this->instance->setCustomerId($value);
        return $this;
    }

    /**
     * Sets custom attribute field.
     *
     * @param CustomAttribute|null $value
     */
    public function customAttribute(?CustomAttribute $value): self
    {
        $this->instance->setCustomAttribute($value);
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
     * Initializes a new Bulk Upsert Customer Custom Attributes Response Customer Custom Attribute Upsert
     * Response object.
     */
    public function build(): BulkUpsertCustomerCustomAttributesResponseCustomerCustomAttributeUpsertResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
