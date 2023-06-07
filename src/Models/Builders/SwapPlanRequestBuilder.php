<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\SwapPlanRequest;

/**
 * Builder for model SwapPlanRequest
 *
 * @see SwapPlanRequest
 */
class SwapPlanRequestBuilder
{
    /**
     * @var SwapPlanRequest
     */
    private $instance;

    private function __construct(SwapPlanRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new swap plan request Builder object.
     */
    public static function init(): self
    {
        return new self(new SwapPlanRequest());
    }

    /**
     * Sets new plan variation id field.
     */
    public function newPlanVariationId(?string $value): self
    {
        $this->instance->setNewPlanVariationId($value);
        return $this;
    }

    /**
     * Unsets new plan variation id field.
     */
    public function unsetNewPlanVariationId(): self
    {
        $this->instance->unsetNewPlanVariationId();
        return $this;
    }

    /**
     * Sets phases field.
     */
    public function phases(?array $value): self
    {
        $this->instance->setPhases($value);
        return $this;
    }

    /**
     * Unsets phases field.
     */
    public function unsetPhases(): self
    {
        $this->instance->unsetPhases();
        return $this;
    }

    /**
     * Initializes a new swap plan request object.
     */
    public function build(): SwapPlanRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
