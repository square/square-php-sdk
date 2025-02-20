<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Shift;
use Square\Legacy\Models\UpdateShiftRequest;

/**
 * Builder for model UpdateShiftRequest
 *
 * @see UpdateShiftRequest
 */
class UpdateShiftRequestBuilder
{
    /**
     * @var UpdateShiftRequest
     */
    private $instance;

    private function __construct(UpdateShiftRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Shift Request Builder object.
     *
     * @param Shift $shift
     */
    public static function init(Shift $shift): self
    {
        return new self(new UpdateShiftRequest($shift));
    }

    /**
     * Initializes a new Update Shift Request object.
     */
    public function build(): UpdateShiftRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
