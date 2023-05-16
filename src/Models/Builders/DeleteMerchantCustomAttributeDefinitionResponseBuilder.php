<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeleteMerchantCustomAttributeDefinitionResponse;

/**
 * Builder for model DeleteMerchantCustomAttributeDefinitionResponse
 *
 * @see DeleteMerchantCustomAttributeDefinitionResponse
 */
class DeleteMerchantCustomAttributeDefinitionResponseBuilder
{
    /**
     * @var DeleteMerchantCustomAttributeDefinitionResponse
     */
    private $instance;

    private function __construct(DeleteMerchantCustomAttributeDefinitionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new delete merchant custom attribute definition response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteMerchantCustomAttributeDefinitionResponse());
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
     * Initializes a new delete merchant custom attribute definition response object.
     */
    public function build(): DeleteMerchantCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
