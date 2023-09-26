<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Device;
use Square\Models\GetDeviceResponse;

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
     * Initializes a new get device response Builder object.
     */
    public static function init(): self
    {
        return new self(new GetDeviceResponse());
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
     * Sets device field.
     */
    public function device(?Device $value): self
    {
        $this->instance->setDevice($value);
        return $this;
    }

    /**
     * Initializes a new get device response object.
     */
    public function build(): GetDeviceResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
