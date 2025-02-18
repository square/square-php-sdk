<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BulkSwapPlanResponse;
use Square\Legacy\Models\Error;

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
     * Initializes a new Bulk Swap Plan Response Builder object.
     */
    public static function init(): self
    {
        return new self(new BulkSwapPlanResponse());
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
     * Sets affected subscriptions field.
     *
     * @param int|null $value
     */
    public function affectedSubscriptions(?int $value): self
    {
        $this->instance->setAffectedSubscriptions($value);
        return $this;
    }

    /**
     * Initializes a new Bulk Swap Plan Response object.
     */
    public function build(): BulkSwapPlanResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
