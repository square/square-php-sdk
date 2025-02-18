<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes changes to a subscription and the subscription status.
 */
class SubscriptionEvent extends JsonSerializableType
{
    /**
     * @var string $id The ID of the subscription event.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * Type of the subscription event.
     * See [SubscriptionEventSubscriptionEventType](#type-subscriptioneventsubscriptioneventtype) for possible values
     *
     * @var value-of<SubscriptionEventSubscriptionEventType> $subscriptionEventType
     */
    #[JsonProperty('subscription_event_type')]
    private string $subscriptionEventType;

    /**
     * @var string $effectiveDate The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) when the subscription event occurred.
     */
    #[JsonProperty('effective_date')]
    private string $effectiveDate;

    /**
     * @var ?int $monthlyBillingAnchorDate The day-of-the-month the billing anchor date was changed to, if applicable.
     */
    #[JsonProperty('monthly_billing_anchor_date')]
    private ?int $monthlyBillingAnchorDate;

    /**
     * @var ?SubscriptionEventInfo $info Additional information about the subscription event.
     */
    #[JsonProperty('info')]
    private ?SubscriptionEventInfo $info;

    /**
     * @var ?array<Phase> $phases A list of Phases, to pass phase-specific information used in the swap.
     */
    #[JsonProperty('phases'), ArrayType([Phase::class])]
    private ?array $phases;

    /**
     * @var string $planVariationId The ID of the subscription plan variation associated with the subscription.
     */
    #[JsonProperty('plan_variation_id')]
    private string $planVariationId;

    /**
     * @param array{
     *   id: string,
     *   subscriptionEventType: value-of<SubscriptionEventSubscriptionEventType>,
     *   effectiveDate: string,
     *   planVariationId: string,
     *   monthlyBillingAnchorDate?: ?int,
     *   info?: ?SubscriptionEventInfo,
     *   phases?: ?array<Phase>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->subscriptionEventType = $values['subscriptionEventType'];
        $this->effectiveDate = $values['effectiveDate'];
        $this->monthlyBillingAnchorDate = $values['monthlyBillingAnchorDate'] ?? null;
        $this->info = $values['info'] ?? null;
        $this->phases = $values['phases'] ?? null;
        $this->planVariationId = $values['planVariationId'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return value-of<SubscriptionEventSubscriptionEventType>
     */
    public function getSubscriptionEventType(): string
    {
        return $this->subscriptionEventType;
    }

    /**
     * @param value-of<SubscriptionEventSubscriptionEventType> $value
     */
    public function setSubscriptionEventType(string $value): self
    {
        $this->subscriptionEventType = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEffectiveDate(): string
    {
        return $this->effectiveDate;
    }

    /**
     * @param string $value
     */
    public function setEffectiveDate(string $value): self
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
     * @return ?SubscriptionEventInfo
     */
    public function getInfo(): ?SubscriptionEventInfo
    {
        return $this->info;
    }

    /**
     * @param ?SubscriptionEventInfo $value
     */
    public function setInfo(?SubscriptionEventInfo $value = null): self
    {
        $this->info = $value;
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
     * @return string
     */
    public function getPlanVariationId(): string
    {
        return $this->planVariationId;
    }

    /**
     * @param string $value
     */
    public function setPlanVariationId(string $value): self
    {
        $this->planVariationId = $value;
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
