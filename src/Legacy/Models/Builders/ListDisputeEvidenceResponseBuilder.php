<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DisputeEvidence;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListDisputeEvidenceResponse;

/**
 * Builder for model ListDisputeEvidenceResponse
 *
 * @see ListDisputeEvidenceResponse
 */
class ListDisputeEvidenceResponseBuilder
{
    /**
     * @var ListDisputeEvidenceResponse
     */
    private $instance;

    private function __construct(ListDisputeEvidenceResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Dispute Evidence Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListDisputeEvidenceResponse());
    }

    /**
     * Sets evidence field.
     *
     * @param DisputeEvidence[]|null $value
     */
    public function evidence(?array $value): self
    {
        $this->instance->setEvidence($value);
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
     * Initializes a new List Dispute Evidence Response object.
     */
    public function build(): ListDisputeEvidenceResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
