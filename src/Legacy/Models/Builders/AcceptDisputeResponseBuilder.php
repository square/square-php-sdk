<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\AcceptDisputeResponse;
use Square\Legacy\Models\Dispute;
use Square\Legacy\Models\Error;

/**
 * Builder for model AcceptDisputeResponse
 *
 * @see AcceptDisputeResponse
 */
class AcceptDisputeResponseBuilder
{
    /**
     * @var AcceptDisputeResponse
     */
    private $instance;

    private function __construct(AcceptDisputeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Accept Dispute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new AcceptDisputeResponse());
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
     * Initializes a new Accept Dispute Response object.
     */
    public function build(): AcceptDisputeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
