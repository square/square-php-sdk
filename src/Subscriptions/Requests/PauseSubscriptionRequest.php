<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\ChangeTiming;

class PauseSubscriptionRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId The ID of the subscription to pause.
     */
    private string $subscriptionId;

    /**
     * The `YYYY-MM-DD`-formatted date when the scheduled `PAUSE` action takes place on the subscription.
     *
     * When this date is unspecified or falls within the current billing cycle, the subscription is paused
     * on the starting date of the next billing cycle.
     *
     * @var ?string $pauseEffectiveDate
     */
    #[JsonProperty('pause_effective_date')]
    private ?string $pauseEffectiveDate;

    /**
     * The number of billing cycles the subscription will be paused before it is reactivated.
     *
     * When this is set, a `RESUME` action is also scheduled to take place on the subscription at
     * the end of the specified pause cycle duration. In this case, neither `resume_effective_date`
     * nor `resume_change_timing` may be specified.
     *
     * @var ?int $pauseCycleDuration
     */
    #[JsonProperty('pause_cycle_duration')]
    private ?int $pauseCycleDuration;

    /**
     * The date when the subscription is reactivated by a scheduled `RESUME` action.
     * This date must be at least one billing cycle ahead of `pause_effective_date`.
     *
     * @var ?string $resumeEffectiveDate
     */
    #[JsonProperty('resume_effective_date')]
    private ?string $resumeEffectiveDate;

    /**
     * The timing whether the subscription is reactivated immediately or at the end of the billing cycle, relative to
     * `resume_effective_date`.
     * See [ChangeTiming](#type-changetiming) for possible values
     *
     * @var ?value-of<ChangeTiming> $resumeChangeTiming
     */
    #[JsonProperty('resume_change_timing')]
    private ?string $resumeChangeTiming;

    /**
     * @var ?string $pauseReason The user-provided reason to pause the subscription.
     */
    #[JsonProperty('pause_reason')]
    private ?string $pauseReason;

    /**
     * @param array{
     *   subscriptionId: string,
     *   pauseEffectiveDate?: ?string,
     *   pauseCycleDuration?: ?int,
     *   resumeEffectiveDate?: ?string,
     *   resumeChangeTiming?: ?value-of<ChangeTiming>,
     *   pauseReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->pauseEffectiveDate = $values['pauseEffectiveDate'] ?? null;
        $this->pauseCycleDuration = $values['pauseCycleDuration'] ?? null;
        $this->resumeEffectiveDate = $values['resumeEffectiveDate'] ?? null;
        $this->resumeChangeTiming = $values['resumeChangeTiming'] ?? null;
        $this->pauseReason = $values['pauseReason'] ?? null;
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
    public function getPauseEffectiveDate(): ?string
    {
        return $this->pauseEffectiveDate;
    }

    /**
     * @param ?string $value
     */
    public function setPauseEffectiveDate(?string $value = null): self
    {
        $this->pauseEffectiveDate = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPauseCycleDuration(): ?int
    {
        return $this->pauseCycleDuration;
    }

    /**
     * @param ?int $value
     */
    public function setPauseCycleDuration(?int $value = null): self
    {
        $this->pauseCycleDuration = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getResumeEffectiveDate(): ?string
    {
        return $this->resumeEffectiveDate;
    }

    /**
     * @param ?string $value
     */
    public function setResumeEffectiveDate(?string $value = null): self
    {
        $this->resumeEffectiveDate = $value;
        return $this;
    }

    /**
     * @return ?value-of<ChangeTiming>
     */
    public function getResumeChangeTiming(): ?string
    {
        return $this->resumeChangeTiming;
    }

    /**
     * @param ?value-of<ChangeTiming> $value
     */
    public function setResumeChangeTiming(?string $value = null): self
    {
        $this->resumeChangeTiming = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPauseReason(): ?string
    {
        return $this->pauseReason;
    }

    /**
     * @param ?string $value
     */
    public function setPauseReason(?string $value = null): self
    {
        $this->pauseReason = $value;
        return $this;
    }
}
