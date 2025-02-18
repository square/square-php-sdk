<?php

namespace Square\Orders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Order;
use Square\Core\Json\JsonProperty;
use Square\Types\OrderReward;
use Square\Core\Types\ArrayType;

class CalculateOrderRequest extends JsonSerializableType
{
    /**
     * @var Order $order The order to be calculated. Expects the entire order, not a sparse update.
     */
    #[JsonProperty('order')]
    private Order $order;

    /**
     * Identifies one or more loyalty reward tiers to apply during the order calculation.
     * The discounts defined by the reward tiers are added to the order only to preview the
     * effect of applying the specified rewards. The rewards do not correspond to actual
     * redemptions; that is, no `reward`s are created. Therefore, the reward `id`s are
     * random strings used only to reference the reward tier.
     *
     * @var ?array<OrderReward> $proposedRewards
     */
    #[JsonProperty('proposed_rewards'), ArrayType([OrderReward::class])]
    private ?array $proposedRewards;

    /**
     * @param array{
     *   order: Order,
     *   proposedRewards?: ?array<OrderReward>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->order = $values['order'];
        $this->proposedRewards = $values['proposedRewards'] ?? null;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $value
     */
    public function setOrder(Order $value): self
    {
        $this->order = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReward>
     */
    public function getProposedRewards(): ?array
    {
        return $this->proposedRewards;
    }

    /**
     * @param ?array<OrderReward> $value
     */
    public function setProposedRewards(?array $value = null): self
    {
        $this->proposedRewards = $value;
        return $this;
    }
}
