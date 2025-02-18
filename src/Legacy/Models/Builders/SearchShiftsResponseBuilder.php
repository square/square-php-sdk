<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\SearchShiftsResponse;
use Square\Legacy\Models\Shift;

/**
 * Builder for model SearchShiftsResponse
 *
 * @see SearchShiftsResponse
 */
class SearchShiftsResponseBuilder
{
    /**
     * @var SearchShiftsResponse
     */
    private $instance;

    private function __construct(SearchShiftsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Shifts Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchShiftsResponse());
    }

    /**
     * Sets shifts field.
     *
     * @param Shift[]|null $value
     */
    public function shifts(?array $value): self
    {
        $this->instance->setShifts($value);
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
     * Initializes a new Search Shifts Response object.
     */
    public function build(): SearchShiftsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
