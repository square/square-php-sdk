<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\TerminalRefundQuery;
use Square\Legacy\Models\TerminalRefundQueryFilter;
use Square\Legacy\Models\TerminalRefundQuerySort;

/**
 * Builder for model TerminalRefundQuery
 *
 * @see TerminalRefundQuery
 */
class TerminalRefundQueryBuilder
{
    /**
     * @var TerminalRefundQuery
     */
    private $instance;

    private function __construct(TerminalRefundQuery $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Terminal Refund Query Builder object.
     */
    public static function init(): self
    {
        return new self(new TerminalRefundQuery());
    }

    /**
     * Sets filter field.
     *
     * @param TerminalRefundQueryFilter|null $value
     */
    public function filter(?TerminalRefundQueryFilter $value): self
    {
        $this->instance->setFilter($value);
        return $this;
    }

    /**
     * Sets sort field.
     *
     * @param TerminalRefundQuerySort|null $value
     */
    public function sort(?TerminalRefundQuerySort $value): self
    {
        $this->instance->setSort($value);
        return $this;
    }

    /**
     * Initializes a new Terminal Refund Query object.
     */
    public function build(): TerminalRefundQuery
    {
        return CoreHelper::clone($this->instance);
    }
}
