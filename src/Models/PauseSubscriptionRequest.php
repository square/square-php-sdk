<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Defines input parameters in a request to the
 * [PauseSubscription]($e/Subscriptions/PauseSubscription) endpoint.
 */
class PauseSubscriptionRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $pauseEffectiveDate;

    /**
     * @var int|null
     */
    private $pauseCycleDuration;

    /**
     * @var string|null
     */
    private $resumeEffectiveDate;

    /**
     * @var string|null
     */
    private $resumeChangeTiming;

    /**
     * @var string|null
     */
    private $pauseReason;

    /**
     * Returns Pause Effective Date.
     *
     * The `YYYY-MM-DD`-formatted date when the scheduled `PAUSE` action takes place on the subscription.
     *
     * When this date is unspecified or falls within the current billing cycle, the subscription is paused
     * on the starting date of the next billing cycle.
     */
    public function getPauseEffectiveDate(): ?string
    {
        return $this->pauseEffectiveDate;
    }

    /**
     * Sets Pause Effective Date.
     *
     * The `YYYY-MM-DD`-formatted date when the scheduled `PAUSE` action takes place on the subscription.
     *
     * When this date is unspecified or falls within the current billing cycle, the subscription is paused
     * on the starting date of the next billing cycle.
     *
     * @maps pause_effective_date
     */
    public function setPauseEffectiveDate(?string $pauseEffectiveDate): void
    {
        $this->pauseEffectiveDate = $pauseEffectiveDate;
    }

    /**
     * Returns Pause Cycle Duration.
     *
     * The number of billing cycles the subscription will be paused before it is reactivated.
     *
     * When this is set, a `RESUME` action is also scheduled to take place on the subscription at
     * the end of the specified pause cycle duration. In this case, neither `resume_effective_date`
     * nor `resume_change_timing` may be specified.
     */
    public function getPauseCycleDuration(): ?int
    {
        return $this->pauseCycleDuration;
    }

    /**
     * Sets Pause Cycle Duration.
     *
     * The number of billing cycles the subscription will be paused before it is reactivated.
     *
     * When this is set, a `RESUME` action is also scheduled to take place on the subscription at
     * the end of the specified pause cycle duration. In this case, neither `resume_effective_date`
     * nor `resume_change_timing` may be specified.
     *
     * @maps pause_cycle_duration
     */
    public function setPauseCycleDuration(?int $pauseCycleDuration): void
    {
        $this->pauseCycleDuration = $pauseCycleDuration;
    }

    /**
     * Returns Resume Effective Date.
     *
     * The date when the subscription is reactivated by a scheduled `RESUME` action.
     * This date must be at least one billing cycle ahead of `pause_effective_date`.
     */
    public function getResumeEffectiveDate(): ?string
    {
        return $this->resumeEffectiveDate;
    }

    /**
     * Sets Resume Effective Date.
     *
     * The date when the subscription is reactivated by a scheduled `RESUME` action.
     * This date must be at least one billing cycle ahead of `pause_effective_date`.
     *
     * @maps resume_effective_date
     */
    public function setResumeEffectiveDate(?string $resumeEffectiveDate): void
    {
        $this->resumeEffectiveDate = $resumeEffectiveDate;
    }

    /**
     * Returns Resume Change Timing.
     *
     * Supported timings when a pending change, as an action, takes place to a subscription.
     */
    public function getResumeChangeTiming(): ?string
    {
        return $this->resumeChangeTiming;
    }

    /**
     * Sets Resume Change Timing.
     *
     * Supported timings when a pending change, as an action, takes place to a subscription.
     *
     * @maps resume_change_timing
     */
    public function setResumeChangeTiming(?string $resumeChangeTiming): void
    {
        $this->resumeChangeTiming = $resumeChangeTiming;
    }

    /**
     * Returns Pause Reason.
     *
     * The user-provided reason to pause the subscription.
     */
    public function getPauseReason(): ?string
    {
        return $this->pauseReason;
    }

    /**
     * Sets Pause Reason.
     *
     * The user-provided reason to pause the subscription.
     *
     * @maps pause_reason
     */
    public function setPauseReason(?string $pauseReason): void
    {
        $this->pauseReason = $pauseReason;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->pauseEffectiveDate)) {
            $json['pause_effective_date']  = $this->pauseEffectiveDate;
        }
        if (isset($this->pauseCycleDuration)) {
            $json['pause_cycle_duration']  = $this->pauseCycleDuration;
        }
        if (isset($this->resumeEffectiveDate)) {
            $json['resume_effective_date'] = $this->resumeEffectiveDate;
        }
        if (isset($this->resumeChangeTiming)) {
            $json['resume_change_timing']  = $this->resumeChangeTiming;
        }
        if (isset($this->pauseReason)) {
            $json['pause_reason']          = $this->pauseReason;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
