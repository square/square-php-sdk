<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class ChangeBillingAnchorDateRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId The ID of the subscription to update the billing anchor date.
     */
    private string $subscriptionId;

    /**
     * @var ?int $monthlyBillingAnchorDate The anchor day for the billing cycle.
     */
    #[JsonProperty('monthly_billing_anchor_date')]
    private ?int $monthlyBillingAnchorDate;

    /**
     * The `YYYY-MM-DD`-formatted date when the scheduled `BILLING_ANCHOR_CHANGE` action takes
     * place on the subscription.
     *
     * When this date is unspecified or falls within the current billing cycle, the billing anchor date
     * is changed immediately.
     *
     * @var ?string $effectiveDate
     */
    #[JsonProperty('effective_date')]
    private ?string $effectiveDate;

    /**
     * @param array{
     *   subscriptionId: string,
     *   monthlyBillingAnchorDate?: ?int,
     *   effectiveDate?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->monthlyBillingAnchorDate = $values['monthlyBillingAnchorDate'] ?? null;
        $this->effectiveDate = $values['effectiveDate'] ?? null;
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
}
