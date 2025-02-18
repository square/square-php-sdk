<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Job;
use Square\Legacy\Models\RetrieveJobResponse;

/**
 * Builder for model RetrieveJobResponse
 *
 * @see RetrieveJobResponse
 */
class RetrieveJobResponseBuilder
{
    /**
     * @var RetrieveJobResponse
     */
    private $instance;

    private function __construct(RetrieveJobResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Job Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveJobResponse());
    }

    /**
     * Sets job field.
     *
     * @param Job|null $value
     */
    public function job(?Job $value): self
    {
        $this->instance->setJob($value);
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
     * Initializes a new Retrieve Job Response object.
     */
    public function build(): RetrieveJobResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
