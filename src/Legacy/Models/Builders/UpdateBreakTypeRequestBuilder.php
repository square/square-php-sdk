<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BreakType;
use Square\Legacy\Models\UpdateBreakTypeRequest;

/**
 * Builder for model UpdateBreakTypeRequest
 *
 * @see UpdateBreakTypeRequest
 */
class UpdateBreakTypeRequestBuilder
{
    /**
     * @var UpdateBreakTypeRequest
     */
    private $instance;

    private function __construct(UpdateBreakTypeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Break Type Request Builder object.
     *
     * @param BreakType $breakType
     */
    public static function init(BreakType $breakType): self
    {
        return new self(new UpdateBreakTypeRequest($breakType));
    }

    /**
     * Initializes a new Update Break Type Request object.
     */
    public function build(): UpdateBreakTypeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
