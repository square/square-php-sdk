<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\OrderReward;

/**
 * Builder for model OrderReward
 *
 * @see OrderReward
 */
class OrderRewardBuilder
{
    /**
     * @var OrderReward
     */
    private $instance;

    private function __construct(OrderReward $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Order Reward Builder object.
     *
     * @param string $id
     * @param string $rewardTierId
     */
    public static function init(string $id, string $rewardTierId): self
    {
        return new self(new OrderReward($id, $rewardTierId));
    }

    /**
     * Initializes a new Order Reward object.
     */
    public function build(): OrderReward
    {
        return CoreHelper::clone($this->instance);
    }
}
