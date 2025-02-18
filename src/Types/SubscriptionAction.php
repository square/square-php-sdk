<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an action as a pending change to a subscription.
 */
class SubscriptionAction extends JsonSerializableType
{
    /**
     * @var ?string $id The ID of an action scoped to a subscription.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The type of the action.
     * See [SubscriptionActionType](#type-subscriptionactiontype) for possible values
     *
     * @var ?value-of<SubscriptionActionType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $effectiveDate The `YYYY-MM-DD`-formatted date when the action occurs on the subscription.
     */
    #[JsonProperty('effective_date')]
    private ?string $effectiveDate;

    /**
     * @var ?int $monthlyBillingAnchorDate The new billing anchor day value, for a `CHANGE_BILLING_ANCHOR_DATE` action.
     */
    #[JsonProperty('monthly_billing_anchor_date')]
    private ?int $monthlyBillingAnchorDate;

    /**
     * @var ?array<Phase> $phases A list of Phases, to pass phase-specific information used in the swap.
     */
    #[JsonProperty('phases'), ArrayType([Phase::class])]
    private ?array $phases;

    /**
     * @var ?string $newPlanVariationId The target subscription plan variation that a subscription switches to, for a `SWAP_PLAN` action.
     */
    #[JsonProperty('new_plan_variation_id')]
    private ?string $newPlanVariationId;

    /**
     * @param array{
     *   id?: ?string,
     *   type?: ?value-of<SubscriptionActionType>,
     *   effectiveDate?: ?string,
     *   monthlyBillingAnchorDate?: ?int,
     *   phases?: ?array<Phase>,
     *   newPlanVariationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->effectiveDate = $values['effectiveDate'] ?? null;
        $this->monthlyBillingAnchorDate = $values['monthlyBillingAnchorDate'] ?? null;
        $this->phases = $values['phases'] ?? null;
        $this->newPlanVariationId = $values['newPlanVariationId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?value-of<SubscriptionActionType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<SubscriptionActionType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEffectiveDate(): ?string
    {
        return $this->effectiveDate;
    }

    /**
     * @param ?string $value
     */
    public function setEffectiveDate(?string $value = null): self
    {
        $this->effectiveDate = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMonthlyBillingAnchorDate(): ?int
    {
        return $this->monthlyBillingAnchorDate;
    }

    /**
     * @param ?int $value
     */
    public function setMonthlyBillingAnchorDate(?int $value = null): self
    {
        $this->monthlyBillingAnchorDate = $value;
        return $this;
    }

    /**
     * @return ?array<Phase>
     */
    public function getPhases(): ?array
    {
        return $this->phases;
    }

    /**
     * @param ?array<Phase> $value
     */
    public function setPhases(?array $value = null): self
    {
        $this->phases = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
