<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CancelTerminalActionResponse;
use Square\Models\Error;
use Square\Models\TerminalAction;

/**
 * Builder for model CancelTerminalActionResponse
 *
 * @see CancelTerminalActionResponse
 */
class CancelTerminalActionResponseBuilder
{
    /**
     * @var CancelTerminalActionResponse
     */
    private $instance;

    private function __construct(CancelTerminalActionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Cancel Terminal Action Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CancelTerminalActionResponse());
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
     * Initializes a new Cancel Terminal Action Response object.
     */
    public function build(): CancelTerminalActionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
