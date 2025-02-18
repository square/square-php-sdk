<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateJobRequest;
use Square\Legacy\Models\Job;

/**
 * Builder for model CreateJobRequest
 *
 * @see CreateJobRequest
 */
class CreateJobRequestBuilder
{
    /**
     * @var CreateJobRequest
     */
    private $instance;

    private function __construct(CreateJobRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Job Request Builder object.
     *
     * @param Job $job
     * @param string $idempotencyKey
     */
    public static function init(Job $job, string $idempotencyKey): self
    {
        return new self(new CreateJobRequest($job, $idempotencyKey));
    }

    /**
     * Initializes a new Create Job Request object.
     */
    public function build(): CreateJobRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
