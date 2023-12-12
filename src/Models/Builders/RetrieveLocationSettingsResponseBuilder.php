<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutLocationSettings;
use Square\Models\RetrieveLocationSettingsResponse;

/**
 * Builder for model RetrieveLocationSettingsResponse
 *
 * @see RetrieveLocationSettingsResponse
 */
class RetrieveLocationSettingsResponseBuilder
{
    /**
     * @var RetrieveLocationSettingsResponse
     */
    private $instance;

    private function __construct(RetrieveLocationSettingsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new retrieve location settings response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveLocationSettingsResponse());
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
     * Sets location settings field.
     */
    public function locationSettings(?CheckoutLocationSettings $value): self
    {
        $this->instance->setLocationSettings($value);
        return $this;
    }

    /**
     * Initializes a new retrieve location settings response object.
     */
    public function build(): RetrieveLocationSettingsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
