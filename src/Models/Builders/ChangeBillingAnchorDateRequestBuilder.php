<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ChangeBillingAnchorDateRequest;

/**
 * Builder for model ChangeBillingAnchorDateRequest
 *
 * @see ChangeBillingAnchorDateRequest
 */
class ChangeBillingAnchorDateRequestBuilder
{
    /**
     * @var ChangeBillingAnchorDateRequest
     */
    private $instance;

    private function __construct(ChangeBillingAnchorDateRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new change billing anchor date request Builder object.
     */
    public static function init(): self
    {
        return new self(new ChangeBillingAnchorDateRequest());
    }

    /**
     * Sets monthly billing anchor date field.
     */
    public function monthlyBillingAnchorDate(?int $value): self
    {
        $this->instance->setMonthlyBillingAnchorDate($value);
        return $this;
    }

    /**
     * Unsets monthly billing anchor date field.
     */
    public function unsetMonthlyBillingAnchorDate(): self
    {
        $this->instance->unsetMonthlyBillingAnchorDate();
        return $this;
    }

    /**
     * Sets effective date field.
     */
    public function effectiveDate(?string $value): self
    {
        $this->instance->setEffectiveDate($value);
        return $this;
    }

    /**
     * Unsets effective date field.
     */
    public function unsetEffectiveDate(): self
    {
        $this->instance->unsetEffectiveDate();
        return $this;
    }

    /**
     * Initializes a new change billing anchor date request object.
     */
    public function build(): ChangeBillingAnchorDateRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
