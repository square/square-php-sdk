<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Dispute;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveDisputeResponse;

/**
 * Builder for model RetrieveDisputeResponse
 *
 * @see RetrieveDisputeResponse
 */
class RetrieveDisputeResponseBuilder
{
    /**
     * @var RetrieveDisputeResponse
     */
    private $instance;

    private function __construct(RetrieveDisputeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Dispute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveDisputeResponse());
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
     * Initializes a new Retrieve Dispute Response object.
     */
    public function build(): RetrieveDisputeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
