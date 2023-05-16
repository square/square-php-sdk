<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CustomAttribute;
use Square\Models\UpsertMerchantCustomAttributeRequest;

/**
 * Builder for model UpsertMerchantCustomAttributeRequest
 *
 * @see UpsertMerchantCustomAttributeRequest
 */
class UpsertMerchantCustomAttributeRequestBuilder
{
    /**
     * @var UpsertMerchantCustomAttributeRequest
     */
    private $instance;

    private function __construct(UpsertMerchantCustomAttributeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new upsert merchant custom attribute request Builder object.
     */
    public static function init(CustomAttribute $customAttribute): self
    {
        return new self(new UpsertMerchantCustomAttributeRequest($customAttribute));
    }

    /**
     * Sets idempotency key field.
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
     * Initializes a new upsert merchant custom attribute request object.
     */
    public function build(): UpsertMerchantCustomAttributeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
