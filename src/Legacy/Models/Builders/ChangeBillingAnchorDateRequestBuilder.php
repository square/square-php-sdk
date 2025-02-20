<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\ChangeBillingAnchorDateRequest;

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
     * Initializes a new Change Billing Anchor Date Request Builder object.
     */
    public static function init(): self
    {
        return new self(new ChangeBillingAnchorDateRequest());
    }

    /**
     * Sets monthly billing anchor date field.
     *
     * @param int|null $value
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
     *
     * @param string|null $value
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
     * Initializes a new Change Billing Anchor Date Request object.
     */
    public function build(): ChangeBillingAnchorDateRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
