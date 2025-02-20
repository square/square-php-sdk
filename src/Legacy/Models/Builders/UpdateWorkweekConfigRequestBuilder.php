<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\UpdateWorkweekConfigRequest;
use Square\Legacy\Models\WorkweekConfig;

/**
 * Builder for model UpdateWorkweekConfigRequest
 *
 * @see UpdateWorkweekConfigRequest
 */
class UpdateWorkweekConfigRequestBuilder
{
    /**
     * @var UpdateWorkweekConfigRequest
     */
    private $instance;

    private function __construct(UpdateWorkweekConfigRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Workweek Config Request Builder object.
     *
     * @param WorkweekConfig $workweekConfig
     */
    public static function init(WorkweekConfig $workweekConfig): self
    {
        return new self(new UpdateWorkweekConfigRequest($workweekConfig));
    }

    /**
     * Initializes a new Update Workweek Config Request object.
     */
    public function build(): UpdateWorkweekConfigRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
