<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeviceComponentDetailsCardReaderDetails;

/**
 * Builder for model DeviceComponentDetailsCardReaderDetails
 *
 * @see DeviceComponentDetailsCardReaderDetails
 */
class DeviceComponentDetailsCardReaderDetailsBuilder
{
    /**
     * @var DeviceComponentDetailsCardReaderDetails
     */
    private $instance;

    private function __construct(DeviceComponentDetailsCardReaderDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device component details card reader details Builder object.
     */
    public static function init(): self
    {
        return new self(new DeviceComponentDetailsCardReaderDetails());
    }

    /**
     * Sets version field.
     */
    public function version(?string $value): self
    {
        $this->instance->setVersion($value);
        return $this;
    }

    /**
     * Initializes a new device component details card reader details object.
     */
    public function build(): DeviceComponentDetailsCardReaderDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
