<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateDisputeEvidenceFileResponse;
use Square\Legacy\Models\DisputeEvidence;
use Square\Legacy\Models\Error;

/**
 * Builder for model CreateDisputeEvidenceFileResponse
 *
 * @see CreateDisputeEvidenceFileResponse
 */
class CreateDisputeEvidenceFileResponseBuilder
{
    /**
     * @var CreateDisputeEvidenceFileResponse
     */
    private $instance;

    private function __construct(CreateDisputeEvidenceFileResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Dispute Evidence File Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateDisputeEvidenceFileResponse());
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
     * Sets evidence field.
     *
     * @param DisputeEvidence|null $value
     */
    public function evidence(?DisputeEvidence $value): self
    {
        $this->instance->setEvidence($value);
        return $this;
    }

    /**
     * Initializes a new Create Dispute Evidence File Response object.
     */
    public function build(): CreateDisputeEvidenceFileResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
