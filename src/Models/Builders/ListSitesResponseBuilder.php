<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\ListSitesResponse;
use Square\Models\Site;

/**
 * Builder for model ListSitesResponse
 *
 * @see ListSitesResponse
 */
class ListSitesResponseBuilder
{
    /**
     * @var ListSitesResponse
     */
    private $instance;

    private function __construct(ListSitesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Sites Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListSitesResponse());
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
     * Sets sites field.
     *
     * @param Site[]|null $value
     */
    public function sites(?array $value): self
    {
        $this->instance->setSites($value);
        return $this;
    }

    /**
     * Initializes a new List Sites Response object.
     */
    public function build(): ListSitesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
