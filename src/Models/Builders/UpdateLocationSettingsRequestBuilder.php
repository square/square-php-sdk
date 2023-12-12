<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutLocationSettings;
use Square\Models\UpdateLocationSettingsRequest;

/**
 * Builder for model UpdateLocationSettingsRequest
 *
 * @see UpdateLocationSettingsRequest
 */
class UpdateLocationSettingsRequestBuilder
{
    /**
     * @var UpdateLocationSettingsRequest
     */
    private $instance;

    private function __construct(UpdateLocationSettingsRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new update location settings request Builder object.
     */
    public static function init(CheckoutLocationSettings $locationSettings): self
    {
        return new self(new UpdateLocationSettingsRequest($locationSettings));
    }

    /**
     * Initializes a new update location settings request object.
     */
    public function build(): UpdateLocationSettingsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
