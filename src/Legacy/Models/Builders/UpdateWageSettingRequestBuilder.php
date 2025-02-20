<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\UpdateWageSettingRequest;
use Square\Legacy\Models\WageSetting;

/**
 * Builder for model UpdateWageSettingRequest
 *
 * @see UpdateWageSettingRequest
 */
class UpdateWageSettingRequestBuilder
{
    /**
     * @var UpdateWageSettingRequest
     */
    private $instance;

    private function __construct(UpdateWageSettingRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Wage Setting Request Builder object.
     *
     * @param WageSetting $wageSetting
     */
    public static function init(WageSetting $wageSetting): self
    {
        return new self(new UpdateWageSettingRequest($wageSetting));
    }

    /**
     * Initializes a new Update Wage Setting Request object.
     */
    public function build(): UpdateWageSettingRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
