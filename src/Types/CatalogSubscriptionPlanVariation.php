<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes a subscription plan variation. A subscription plan variation represents how the subscription for a product or service is sold.
 * For more information, see [Subscription Plans and Variations](https://developer.squareup.com/docs/subscriptions-api/plans-and-variations).
 */
class CatalogSubscriptionPlanVariation extends JsonSerializableType
{
    /**
     * @var string $name The name of the plan variation.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var array<SubscriptionPhase> $phases A list containing each [SubscriptionPhase](entity:SubscriptionPhase) for this plan variation.
     */
    #[JsonProperty('phases'), ArrayType([SubscriptionPhase::class])]
    private array $phases;

    /**
     * @var ?string $subscriptionPlanId The id of the subscription plan, if there is one.
     */
    #[JsonProperty('subscription_plan_id')]
    private ?string $subscriptionPlanId;

    /**
     * @var ?int $monthlyBillingAnchorDate The day of the month the billing period starts.
     */
    #[JsonProperty('monthly_billing_anchor_date')]
    private ?int $monthlyBillingAnchorDate;

    /**
     * @var ?bool $canProrate Whether bills for this plan variation can be split for proration.
     */
    #[JsonProperty('can_prorate')]
    private ?bool $canProrate;

    /**
     * The ID of a "successor" plan variation to this one. If the field is set, and this object is disabled at all
     * locations, it indicates that this variation is deprecated and the object identified by the successor ID be used in
     * its stead.
     *
     * @var ?string $successorPlanVariationId
     */
    #[JsonProperty('successor_plan_variation_id')]
    private ?string $successorPlanVariationId;

    /**
     * @param array{
     *   name: string,
     *   phases: array<SubscriptionPhase>,
     *   subscriptionPlanId?: ?string,
     *   monthlyBillingAnchorDate?: ?int,
     *   canProrate?: ?bool,
     *   successorPlanVariationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->phases = $values['phases'];
        $this->subscriptionPlanId = $values['subscriptionPlanId'] ?? null;
        $this->monthlyBillingAnchorDate = $values['monthlyBillingAnchorDate'] ?? null;
        $this->canProrate = $values['canProrate'] ?? null;
        $this->successorPlanVariationId = $values['successorPlanVariationId'] ?? null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return array<SubscriptionPhase>
     */
    public function getPhases(): array
    {
        return $this->phases;
    }

    /**
     * @param array<SubscriptionPhase> $value
     */
    public function setPhases(array $value): self
    {
        $this->phases = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSubscriptionPlanId(): ?string
    {
        return $this->subscriptionPlanId;
    }

    /**
     * @param ?string $value
     */
    public function setSubscriptionPlanId(?string $value = null): self
    {
        $this->subscriptionPlanId = $value;
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
     * @return ?bool
     */
    public function getCanProrate(): ?bool
    {
        return $this->canProrate;
    }

    /**
     * @param ?bool $value
     */
    public function setCanProrate(?bool $value = null): self
    {
        $this->canProrate = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSuccessorPlanVariationId(): ?string
    {
        return $this->successorPlanVariationId;
    }

    /**
     * @param ?string $value
     */
    public function setSuccessorPlanVariationId(?string $value = null): self
    {
        $this->successorPlanVariationId = $value;
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
