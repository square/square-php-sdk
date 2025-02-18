<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteMerchantCustomAttributeResponse;
use Square\Legacy\Models\Error;

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
     * Initializes a new Delete Merchant Custom Attribute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteMerchantCustomAttributeResponse());
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
     * Initializes a new Delete Merchant Custom Attribute Response object.
     */
    public function build(): DeleteMerchantCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
