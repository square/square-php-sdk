<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\UpdateWorkweekConfigResponse;
use Square\Legacy\Models\WorkweekConfig;

/**
 * Builder for model UpdateWorkweekConfigResponse
 *
 * @see UpdateWorkweekConfigResponse
 */
class UpdateWorkweekConfigResponseBuilder
{
    /**
     * @var UpdateWorkweekConfigResponse
     */
    private $instance;

    private function __construct(UpdateWorkweekConfigResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Workweek Config Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateWorkweekConfigResponse());
    }

    /**
     * Sets workweek config field.
     *
     * @param WorkweekConfig|null $value
     */
    public function workweekConfig(?WorkweekConfig $value): self
    {
        $this->instance->setWorkweekConfig($value);
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
     * Initializes a new Update Workweek Config Response object.
     */
    public function build(): UpdateWorkweekConfigResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
