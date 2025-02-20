<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateDeviceCodeRequest;
use Square\Legacy\Models\DeviceCode;

/**
 * Builder for model CreateDeviceCodeRequest
 *
 * @see CreateDeviceCodeRequest
 */
class CreateDeviceCodeRequestBuilder
{
    /**
     * @var CreateDeviceCodeRequest
     */
    private $instance;

    private function __construct(CreateDeviceCodeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Device Code Request Builder object.
     *
     * @param string $idempotencyKey
     * @param DeviceCode $deviceCode
     */
    public static function init(string $idempotencyKey, DeviceCode $deviceCode): self
    {
        return new self(new CreateDeviceCodeRequest($idempotencyKey, $deviceCode));
    }

    /**
     * Initializes a new Create Device Code Request object.
     */
    public function build(): CreateDeviceCodeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
