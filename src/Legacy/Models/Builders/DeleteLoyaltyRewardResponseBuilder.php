<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteLoyaltyRewardResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteLoyaltyRewardResponse
 *
 * @see DeleteLoyaltyRewardResponse
 */
class DeleteLoyaltyRewardResponseBuilder
{
    /**
     * @var DeleteLoyaltyRewardResponse
     */
    private $instance;

    private function __construct(DeleteLoyaltyRewardResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Loyalty Reward Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteLoyaltyRewardResponse());
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
     * Initializes a new Delete Loyalty Reward Response object.
     */
    public function build(): DeleteLoyaltyRewardResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
