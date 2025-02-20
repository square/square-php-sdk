<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\PhaseInput;
use Square\Core\Types\ArrayType;

class SwapPlanRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId The ID of the subscription to swap the subscription plan for.
     */
    private string $subscriptionId;

    /**
     * The ID of the new subscription plan variation.
     *
     * This field is required.
     *
     * @var ?string $newPlanVariationId
     */
    #[JsonProperty('new_plan_variation_id')]
    private ?string $newPlanVariationId;

    /**
     * @var ?array<PhaseInput> $phases A list of PhaseInputs, to pass phase-specific information used in the swap.
     */
    #[JsonProperty('phases'), ArrayType([PhaseInput::class])]
    private ?array $phases;

    /**
     * @param array{
     *   subscriptionId: string,
     *   newPlanVariationId?: ?string,
     *   phases?: ?array<PhaseInput>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->newPlanVariationId = $values['newPlanVariationId'] ?? null;
        $this->phases = $values['phases'] ?? null;
    }

    /**
     * @return string
     */
    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $value
     */
    public function setSubscriptionId(string $value): self
    {
        $this->subscriptionId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNewPlanVariationId(): ?string
    {
        return $this->newPlanVariationId;
    }

    /**
     * @param ?string $value
     */
    public function setNewPlanVariationId(?string $value = null): self
    {
        $this->newPlanVariationId = $value;
        return $this;
    }

    /**
     * @return ?array<PhaseInput>
     */
    public function getPhases(): ?array
    {
        return $this->phases;
    }

    /**
     * @param ?array<PhaseInput> $value
     */
    public function setPhases(?array $value = null): self
    {
        $this->phases = $value;
        return $this;
    }
}
