<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BreakType;
use Square\Models\Error;
use Square\Models\GetBreakTypeResponse;

/**
 * Builder for model GetBreakTypeResponse
 *
 * @see GetBreakTypeResponse
 */
class GetBreakTypeResponseBuilder
{
    /**
     * @var GetBreakTypeResponse
     */
    private $instance;

    private function __construct(GetBreakTypeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Get Break Type Response Builder object.
     */
    public static function init(): self
    {
        return new self(new GetBreakTypeResponse());
    }

    /**
     * Sets break type field.
     *
     * @param BreakType|null $value
     */
    public function breakType(?BreakType $value): self
    {
        $this->instance->setBreakType($value);
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
     * Initializes a new Get Break Type Response object.
     */
    public function build(): GetBreakTypeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
