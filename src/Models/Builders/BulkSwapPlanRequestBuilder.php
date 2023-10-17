<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BulkSwapPlanRequest;

/**
 * Builder for model BulkSwapPlanRequest
 *
 * @see BulkSwapPlanRequest
 */
class BulkSwapPlanRequestBuilder
{
    /**
     * @var BulkSwapPlanRequest
     */
    private $instance;

    private function __construct(BulkSwapPlanRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new bulk swap plan request Builder object.
     */
    public static function init(string $newPlanVariationId, string $oldPlanVariationId, string $locationId): self
    {
        return new self(new BulkSwapPlanRequest($newPlanVariationId, $oldPlanVariationId, $locationId));
    }

    /**
     * Initializes a new bulk swap plan request object.
     */
    public function build(): BulkSwapPlanRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
