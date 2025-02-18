<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeprecatedCreateDisputeEvidenceTextResponse;
use Square\Legacy\Models\DisputeEvidence;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeprecatedCreateDisputeEvidenceTextResponse
 *
 * @see DeprecatedCreateDisputeEvidenceTextResponse
 */
class DeprecatedCreateDisputeEvidenceTextResponseBuilder
{
    /**
     * @var DeprecatedCreateDisputeEvidenceTextResponse
     */
    private $instance;

    private function __construct(DeprecatedCreateDisputeEvidenceTextResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Deprecated Create Dispute Evidence Text Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeprecatedCreateDisputeEvidenceTextResponse());
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
     * Initializes a new Deprecated Create Dispute Evidence Text Response object.
     */
    public function build(): DeprecatedCreateDisputeEvidenceTextResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
