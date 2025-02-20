<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\TerminalActionQuery;
use Square\Legacy\Models\TerminalActionQueryFilter;
use Square\Legacy\Models\TerminalActionQuerySort;

/**
 * Builder for model TerminalActionQuery
 *
 * @see TerminalActionQuery
 */
class TerminalActionQueryBuilder
{
    /**
     * @var TerminalActionQuery
     */
    private $instance;

    private function __construct(TerminalActionQuery $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Terminal Action Query Builder object.
     */
    public static function init(): self
    {
        return new self(new TerminalActionQuery());
    }

    /**
     * Sets filter field.
     *
     * @param TerminalActionQueryFilter|null $value
     */
    public function filter(?TerminalActionQueryFilter $value): self
    {
        $this->instance->setFilter($value);
        return $this;
    }

    /**
     * Sets sort field.
     *
     * @param TerminalActionQuerySort|null $value
     */
    public function sort(?TerminalActionQuerySort $value): self
    {
        $this->instance->setSort($value);
        return $this;
    }

    /**
     * Initializes a new Terminal Action Query object.
     */
    public function build(): TerminalActionQuery
    {
        return CoreHelper::clone($this->instance);
    }
}
