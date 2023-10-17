<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkSwapPlanResponse;

/**
 * Builder for model BulkSwapPlanResponse
 *
 * @see BulkSwapPlanResponse
 */
class BulkSwapPlanResponseBuilder
{
    /**
     * @var BulkSwapPlanResponse
     */
    private $instance;

    private function __construct(BulkSwapPlanResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk swap plan response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkSwapPlanResponse());
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets affected subscriptions field.
     */
    public function affectedSubscriptions(?int $value): self
    {
        $this->instance->setAffectedSubscriptions($value);
        return $this;
    }

    /**
     * Initializes a new bulk swap plan response object.
     */
    public function build(): BulkSwapPlanResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
