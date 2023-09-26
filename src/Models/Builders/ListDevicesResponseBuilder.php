<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListDevicesResponse;

/**
 * Builder for model ListDevicesResponse
 *
 * @see ListDevicesResponse
 */
class ListDevicesResponseBuilder
{
    /**
     * @var ListDevicesResponse
     */
    private $instance;

    private function __construct(ListDevicesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list devices response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListDevicesResponse());
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
     * Sets devices field.
     */
    public function devices(?array $value): self
    {
        $this->instance->setDevices($value);
        return $this;
    }

    /**
     * Sets cursor field.
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new list devices response object.
     */
    public function build(): ListDevicesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
