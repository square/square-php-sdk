<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateDisputeEvidenceTextRequest;

/**
 * Builder for model CreateDisputeEvidenceTextRequest
 *
 * @see CreateDisputeEvidenceTextRequest
 */
class CreateDisputeEvidenceTextRequestBuilder
{
    /**
     * @var CreateDisputeEvidenceTextRequest
     */
    private $instance;

    private function __construct(CreateDisputeEvidenceTextRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Dispute Evidence Text Request Builder object.
     *
     * @param string $idempotencyKey
     * @param string $evidenceText
     */
    public static function init(string $idempotencyKey, string $evidenceText): self
    {
        return new self(new CreateDisputeEvidenceTextRequest($idempotencyKey, $evidenceText));
    }

    /**
     * Sets evidence type field.
     *
     * @param string|null $value
     */
    public function evidenceType(?string $value): self
    {
        $this->instance->setEvidenceType($value);
        return $this;
    }

    /**
     * Initializes a new Create Dispute Evidence Text Request object.
     */
    public function build(): CreateDisputeEvidenceTextRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
