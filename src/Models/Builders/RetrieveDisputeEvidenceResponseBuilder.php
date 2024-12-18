<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DisputeEvidence;
use Square\Models\Error;
use Square\Models\RetrieveDisputeEvidenceResponse;

/**
 * Builder for model RetrieveDisputeEvidenceResponse
 *
 * @see RetrieveDisputeEvidenceResponse
 */
class RetrieveDisputeEvidenceResponseBuilder
{
    /**
     * @var RetrieveDisputeEvidenceResponse
     */
    private $instance;

    private function __construct(RetrieveDisputeEvidenceResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Dispute Evidence Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveDisputeEvidenceResponse());
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
     * Initializes a new Retrieve Dispute Evidence Response object.
     */
    public function build(): RetrieveDisputeEvidenceResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
