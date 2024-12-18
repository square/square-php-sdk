<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutLocationSettings;
use Square\Models\Error;
use Square\Models\UpdateLocationSettingsResponse;

/**
 * Builder for model UpdateLocationSettingsResponse
 *
 * @see UpdateLocationSettingsResponse
 */
class UpdateLocationSettingsResponseBuilder
{
    /**
     * @var UpdateLocationSettingsResponse
     */
    private $instance;

    private function __construct(UpdateLocationSettingsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Location Settings Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateLocationSettingsResponse());
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
     * Sets location settings field.
     *
     * @param CheckoutLocationSettings|null $value
     */
    public function locationSettings(?CheckoutLocationSettings $value): self
    {
        $this->instance->setLocationSettings($value);
        return $this;
    }

    /**
     * Initializes a new Update Location Settings Response object.
     */
    public function build(): UpdateLocationSettingsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
