<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutMerchantSettings;
use Square\Models\UpdateMerchantSettingsResponse;

/**
 * Builder for model UpdateMerchantSettingsResponse
 *
 * @see UpdateMerchantSettingsResponse
 */
class UpdateMerchantSettingsResponseBuilder
{
    /**
     * @var UpdateMerchantSettingsResponse
     */
    private $instance;

    private function __construct(UpdateMerchantSettingsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new update merchant settings response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateMerchantSettingsResponse());
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
     * Sets merchant settings field.
     */
    public function merchantSettings(?CheckoutMerchantSettings $value): self
    {
        $this->instance->setMerchantSettings($value);
        return $this;
    }

    /**
     * Initializes a new update merchant settings response object.
     */
    public function build(): UpdateMerchantSettingsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
