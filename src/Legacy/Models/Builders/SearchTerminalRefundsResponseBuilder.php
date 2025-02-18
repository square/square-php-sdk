<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\SearchTerminalRefundsResponse;
use Square\Legacy\Models\TerminalRefund;

/**
 * Builder for model SearchTerminalRefundsResponse
 *
 * @see SearchTerminalRefundsResponse
 */
class SearchTerminalRefundsResponseBuilder
{
    /**
     * @var SearchTerminalRefundsResponse
     */
    private $instance;

    private function __construct(SearchTerminalRefundsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Terminal Refunds Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchTerminalRefundsResponse());
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
     * Sets refunds field.
     *
     * @param TerminalRefund[]|null $value
     */
    public function refunds(?array $value): self
    {
        $this->instance->setRefunds($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new Search Terminal Refunds Response object.
     */
    public function build(): SearchTerminalRefundsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
