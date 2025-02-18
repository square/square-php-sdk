<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\SearchTerminalCheckoutsResponse;
use Square\Legacy\Models\TerminalCheckout;

/**
 * Builder for model SearchTerminalCheckoutsResponse
 *
 * @see SearchTerminalCheckoutsResponse
 */
class SearchTerminalCheckoutsResponseBuilder
{
    /**
     * @var SearchTerminalCheckoutsResponse
     */
    private $instance;

    private function __construct(SearchTerminalCheckoutsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Terminal Checkouts Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchTerminalCheckoutsResponse());
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
     * Sets checkouts field.
     *
     * @param TerminalCheckout[]|null $value
     */
    public function checkouts(?array $value): self
    {
        $this->instance->setCheckouts($value);
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
     * Initializes a new Search Terminal Checkouts Response object.
     */
    public function build(): SearchTerminalCheckoutsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
