<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeleteMerchantCustomAttributeResponse;

/**
 * Builder for model DeleteMerchantCustomAttributeResponse
 *
 * @see DeleteMerchantCustomAttributeResponse
 */
class DeleteMerchantCustomAttributeResponseBuilder
{
    /**
     * @var DeleteMerchantCustomAttributeResponse
     */
    private $instance;

    private function __construct(DeleteMerchantCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new delete merchant custom attribute response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteMerchantCustomAttributeResponse());
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new delete merchant custom attribute response object.
     */
    public function build(): DeleteMerchantCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
