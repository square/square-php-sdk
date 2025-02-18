<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteBookingCustomAttributeDefinitionResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteBookingCustomAttributeDefinitionResponse
 *
 * @see DeleteBookingCustomAttributeDefinitionResponse
 */
class DeleteBookingCustomAttributeDefinitionResponseBuilder
{
    /**
     * @var DeleteBookingCustomAttributeDefinitionResponse
     */
    private $instance;

    private function __construct(DeleteBookingCustomAttributeDefinitionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Booking Custom Attribute Definition Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteBookingCustomAttributeDefinitionResponse());
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
     * Initializes a new Delete Booking Custom Attribute Definition Response object.
     */
    public function build(): DeleteBookingCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
