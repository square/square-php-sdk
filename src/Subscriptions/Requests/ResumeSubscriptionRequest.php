<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\ChangeTiming;

class ResumeSubscriptionRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId The ID of the subscription to resume.
     */
    private string $subscriptionId;

    /**
     * @var ?string $resumeEffectiveDate The `YYYY-MM-DD`-formatted date when the subscription reactivated.
     */
    #[JsonProperty('resume_effective_date')]
    private ?string $resumeEffectiveDate;

    /**
     * The timing to resume a subscription, relative to the specified
     * `resume_effective_date` attribute value.
     * See [ChangeTiming](#type-changetiming) for possible values
     *
     * @var ?value-of<ChangeTiming> $resumeChangeTiming
     */
    #[JsonProperty('resume_change_timing')]
    private ?string $resumeChangeTiming;

    /**
     * @param array{
     *   subscriptionId: string,
     *   resumeEffectiveDate?: ?string,
     *   resumeChangeTiming?: ?value-of<ChangeTiming>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->resumeEffectiveDate = $values['resumeEffectiveDate'] ?? null;
        $this->resumeChangeTiming = $values['resumeChangeTiming'] ?? null;
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
}
