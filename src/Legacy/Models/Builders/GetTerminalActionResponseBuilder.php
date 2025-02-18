<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GetTerminalActionResponse;
use Square\Legacy\Models\TerminalAction;

/**
 * Builder for model GetTerminalActionResponse
 *
 * @see GetTerminalActionResponse
 */
class GetTerminalActionResponseBuilder
{
    /**
     * @var GetTerminalActionResponse
     */
    private $instance;

    private function __construct(GetTerminalActionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Get Terminal Action Response Builder object.
     */
    public static function init(): self
    {
        return new self(new GetTerminalActionResponse());
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
     * Sets action field.
     *
     * @param TerminalAction|null $value
     */
    public function action(?TerminalAction $value): self
    {
        $this->instance->setAction($value);
        return $this;
    }

    /**
     * Initializes a new Get Terminal Action Response object.
     */
    public function build(): GetTerminalActionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
