<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\TenderBankAccountDetails;

/**
 * Builder for model TenderBankAccountDetails
 *
 * @see TenderBankAccountDetails
 */
class TenderBankAccountDetailsBuilder
{
    /**
     * @var TenderBankAccountDetails
     */
    private $instance;

    private function __construct(TenderBankAccountDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new tender bank account details Builder object.
     */
    public static function init(): self
    {
        return new self(new TenderBankAccountDetails());
    }

    /**
     * Sets status field.
     */
    public function status(?string $value): self
    {
        $this->instance->setStatus($value);
        return $this;
    }

    /**
     * Initializes a new tender bank account details object.
     */
    public function build(): TenderBankAccountDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
