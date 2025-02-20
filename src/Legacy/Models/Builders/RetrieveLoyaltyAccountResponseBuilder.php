<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\LoyaltyAccount;
use Square\Legacy\Models\RetrieveLoyaltyAccountResponse;

/**
 * Builder for model RetrieveLoyaltyAccountResponse
 *
 * @see RetrieveLoyaltyAccountResponse
 */
class RetrieveLoyaltyAccountResponseBuilder
{
    /**
     * @var RetrieveLoyaltyAccountResponse
     */
    private $instance;

    private function __construct(RetrieveLoyaltyAccountResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Loyalty Account Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveLoyaltyAccountResponse());
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
     * Sets loyalty account field.
     *
     * @param LoyaltyAccount|null $value
     */
    public function loyaltyAccount(?LoyaltyAccount $value): self
    {
        $this->instance->setLoyaltyAccount($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Loyalty Account Response object.
     */
    public function build(): RetrieveLoyaltyAccountResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
