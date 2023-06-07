<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DismissTerminalActionResponse;
use Square\Models\TerminalAction;

/**
 * Builder for model DismissTerminalActionResponse
 *
 * @see DismissTerminalActionResponse
 */
class DismissTerminalActionResponseBuilder
{
    /**
     * @var DismissTerminalActionResponse
     */
    private $instance;

    private function __construct(DismissTerminalActionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new dismiss terminal action response Builder object.
     */
    public static function init(): self
    {
        return new self(new DismissTerminalActionResponse());
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets action field.
     */
    public function action(?TerminalAction $value): self
    {
        $this->instance->setAction($value);
        return $this;
    }

    /**
     * Initializes a new dismiss terminal action response object.
     */
    public function build(): DismissTerminalActionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
