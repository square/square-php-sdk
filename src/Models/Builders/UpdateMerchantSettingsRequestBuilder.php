<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutMerchantSettings;
use Square\Models\UpdateMerchantSettingsRequest;

/**
 * Builder for model UpdateMerchantSettingsRequest
 *
 * @see UpdateMerchantSettingsRequest
 */
class UpdateMerchantSettingsRequestBuilder
{
    /**
     * @var UpdateMerchantSettingsRequest
     */
    private $instance;

    private function __construct(UpdateMerchantSettingsRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new update merchant settings request Builder object.
     */
    public static function init(CheckoutMerchantSettings $merchantSettings): self
    {
        return new self(new UpdateMerchantSettingsRequest($merchantSettings));
    }

    /**
     * Initializes a new update merchant settings request object.
     */
    public function build(): UpdateMerchantSettingsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
