<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\UpdateWageSettingResponse;
use Square\Legacy\Models\WageSetting;

/**
 * Builder for model UpdateWageSettingResponse
 *
 * @see UpdateWageSettingResponse
 */
class UpdateWageSettingResponseBuilder
{
    /**
     * @var UpdateWageSettingResponse
     */
    private $instance;

    private function __construct(UpdateWageSettingResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Wage Setting Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateWageSettingResponse());
    }

    /**
     * Sets wage setting field.
     *
     * @param WageSetting|null $value
     */
    public function wageSetting(?WageSetting $value): self
    {
        $this->instance->setWageSetting($value);
        return $this;
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
     * Initializes a new Update Wage Setting Response object.
     */
    public function build(): UpdateWageSettingResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
