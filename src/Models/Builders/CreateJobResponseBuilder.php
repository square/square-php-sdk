<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateJobResponse;
use Square\Models\Error;
use Square\Models\Job;

/**
 * Builder for model CreateJobResponse
 *
 * @see CreateJobResponse
 */
class CreateJobResponseBuilder
{
    /**
     * @var CreateJobResponse
     */
    private $instance;

    private function __construct(CreateJobResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Job Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateJobResponse());
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
     * Initializes a new Create Job Response object.
     */
    public function build(): CreateJobResponse
    {
        return CoreHelper::clone($this->instance);
    }
}