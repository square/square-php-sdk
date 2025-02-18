<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttribute;
use Square\Legacy\Models\UpsertCustomerCustomAttributeRequest;

/**
 * Builder for model UpsertCustomerCustomAttributeRequest
 *
 * @see UpsertCustomerCustomAttributeRequest
 */
class UpsertCustomerCustomAttributeRequestBuilder
{
    /**
     * @var UpsertCustomerCustomAttributeRequest
     */
    private $instance;

    private function __construct(UpsertCustomerCustomAttributeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Upsert Customer Custom Attribute Request Builder object.
     *
     * @param CustomAttribute $customAttribute
     */
    public static function init(CustomAttribute $customAttribute): self
    {
        return new self(new UpsertCustomerCustomAttributeRequest($customAttribute));
    }

    /**
     * Sets idempotency key field.
     *
     * @param string|null $value
     */
    public function idempotencyKey(?string $value): self
    {
        $this->instance->setIdempotencyKey($value);
        return $this;
    }

    /**
     * Unsets idempotency key field.
     */
    public function unsetIdempotencyKey(): self
    {
        $this->instance->unsetIdempotencyKey();
        return $this;
    }

    /**
     * Initializes a new Upsert Customer Custom Attribute Request object.
     */
    public function build(): UpsertCustomerCustomAttributeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
