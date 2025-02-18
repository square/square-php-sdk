<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteBookingCustomAttributeResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteBookingCustomAttributeResponse
 *
 * @see DeleteBookingCustomAttributeResponse
 */
class DeleteBookingCustomAttributeResponseBuilder
{
    /**
     * @var DeleteBookingCustomAttributeResponse
     */
    private $instance;

    private function __construct(DeleteBookingCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Booking Custom Attribute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteBookingCustomAttributeResponse());
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
     * Initializes a new Delete Booking Custom Attribute Response object.
     */
    public function build(): DeleteBookingCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
