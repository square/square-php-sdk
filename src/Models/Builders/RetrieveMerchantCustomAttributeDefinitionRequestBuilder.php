<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\RetrieveMerchantCustomAttributeDefinitionRequest;

/**
 * Builder for model RetrieveMerchantCustomAttributeDefinitionRequest
 *
 * @see RetrieveMerchantCustomAttributeDefinitionRequest
 */
class RetrieveMerchantCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var RetrieveMerchantCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(RetrieveMerchantCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new retrieve merchant custom attribute definition request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveMerchantCustomAttributeDefinitionRequest());
    }

    /**
     * Sets version field.
     */
    public function version(?int $value): self
    {
        $this->instance->setVersion($value);
        return $this;
    }

    /**
     * Initializes a new retrieve merchant custom attribute definition request object.
     */
    public function build(): RetrieveMerchantCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
