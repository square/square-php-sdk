<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\TerminalCheckoutQuerySort;

/**
 * Builder for model TerminalCheckoutQuerySort
 *
 * @see TerminalCheckoutQuerySort
 */
class TerminalCheckoutQuerySortBuilder
{
    /**
     * @var TerminalCheckoutQuerySort
     */
    private $instance;

    private function __construct(TerminalCheckoutQuerySort $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Terminal Checkout Query Sort Builder object.
     */
    public static function init(): self
    {
        return new self(new TerminalCheckoutQuerySort());
    }

    /**
     * Sets sort order field.
     *
     * @param string|null $value
     */
    public function sortOrder(?string $value): self
    {
        $this->instance->setSortOrder($value);
        return $this;
    }

    /**
     * Initializes a new Terminal Checkout Query Sort object.
     */
    public function build(): TerminalCheckoutQuerySort
    {
        return CoreHelper::clone($this->instance);
    }
}
