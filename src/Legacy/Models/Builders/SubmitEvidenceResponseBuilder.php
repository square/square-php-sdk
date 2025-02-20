<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Dispute;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\SubmitEvidenceResponse;

/**
 * Builder for model SubmitEvidenceResponse
 *
 * @see SubmitEvidenceResponse
 */
class SubmitEvidenceResponseBuilder
{
    /**
     * @var SubmitEvidenceResponse
     */
    private $instance;

    private function __construct(SubmitEvidenceResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Submit Evidence Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SubmitEvidenceResponse());
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
     * Sets dispute field.
     *
     * @param Dispute|null $value
     */
    public function dispute(?Dispute $value): self
    {
        $this->instance->setDispute($value);
        return $this;
    }

    /**
     * Initializes a new Submit Evidence Response object.
     */
    public function build(): SubmitEvidenceResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
