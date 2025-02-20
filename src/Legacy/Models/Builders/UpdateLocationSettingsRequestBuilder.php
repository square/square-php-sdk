<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CheckoutLocationSettings;
use Square\Legacy\Models\UpdateLocationSettingsRequest;

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
     * Initializes a new Update Location Settings Request Builder object.
     *
     * @param CheckoutLocationSettings $locationSettings
     */
    public static function init(CheckoutLocationSettings $locationSettings): self
    {
        return new self(new UpdateLocationSettingsRequest($locationSettings));
    }

    /**
     * Initializes a new Update Location Settings Request object.
     */
    public function build(): UpdateLocationSettingsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
