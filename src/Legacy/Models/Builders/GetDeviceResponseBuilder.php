<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Device;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GetDeviceResponse;

/**
 * Builder for model GetDeviceResponse
 *
 * @see GetDeviceResponse
 */
class GetDeviceResponseBuilder
{
    /**
     * @var GetDeviceResponse
     */
    private $instance;

    private function __construct(GetDeviceResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Get Device Response Builder object.
     */
    public static function init(): self
    {
        return new self(new GetDeviceResponse());
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
     * Sets device field.
     *
     * @param Device|null $value
     */
    public function device(?Device $value): self
    {
        $this->instance->setDevice($value);
        return $this;
    }

    /**
     * Initializes a new Get Device Response object.
     */
    public function build(): GetDeviceResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
