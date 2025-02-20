<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BankAccount;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GetBankAccountByV1IdResponse;

/**
 * Builder for model GetBankAccountByV1IdResponse
 *
 * @see GetBankAccountByV1IdResponse
 */
class GetBankAccountByV1IdResponseBuilder
{
    /**
     * @var GetBankAccountByV1IdResponse
     */
    private $instance;

    private function __construct(GetBankAccountByV1IdResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Get Bank Account By V1 Id Response Builder object.
     */
    public static function init(): self
    {
        return new self(new GetBankAccountByV1IdResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets bank account field.
     *
     * @param BankAccount|null $value
     */
    public function bankAccount(?BankAccount $value): self
    {
        $this->instance->setBankAccount($value);
        return $this;
    }

    /**
     * Initializes a new Get Bank Account By V1 Id Response object.
     */
    public function build(): GetBankAccountByV1IdResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
