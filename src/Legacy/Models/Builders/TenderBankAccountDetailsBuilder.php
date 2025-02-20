<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\TenderBankAccountDetails;

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
     * Initializes a new Tender Bank Account Details Builder object.
     */
    public static function init(): self
    {
        return new self(new TenderBankAccountDetails());
    }

    /**
     * Sets status field.
     *
     * @param string|null $value
     */
    public function status(?string $value): self
    {
        $this->instance->setStatus($value);
        return $this;
    }

    /**
     * Initializes a new Tender Bank Account Details object.
     */
    public function build(): TenderBankAccountDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
