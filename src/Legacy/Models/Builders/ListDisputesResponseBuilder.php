<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Dispute;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListDisputesResponse;

/**
 * Builder for model ListDisputesResponse
 *
 * @see ListDisputesResponse
 */
class ListDisputesResponseBuilder
{
    /**
     * @var ListDisputesResponse
     */
    private $instance;

    private function __construct(ListDisputesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Disputes Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListDisputesResponse());
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
     * Sets disputes field.
     *
     * @param Dispute[]|null $value
     */
    public function disputes(?array $value): self
    {
        $this->instance->setDisputes($value);
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
     * Initializes a new List Disputes Response object.
     */
    public function build(): ListDisputesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
