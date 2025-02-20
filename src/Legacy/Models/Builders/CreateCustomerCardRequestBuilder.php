<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Address;
use Square\Legacy\Models\CreateCustomerCardRequest;

/**
 * Builder for model CreateCustomerCardRequest
 *
 * @see CreateCustomerCardRequest
 */
class CreateCustomerCardRequestBuilder
{
    /**
     * @var CreateCustomerCardRequest
     */
    private $instance;

    private function __construct(CreateCustomerCardRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Customer Card Request Builder object.
     *
     * @param string $cardNonce
     */
    public static function init(string $cardNonce): self
    {
        return new self(new CreateCustomerCardRequest($cardNonce));
    }

    /**
     * Sets billing address field.
     *
     * @param Address|null $value
     */
    public function billingAddress(?Address $value): self
    {
        $this->instance->setBillingAddress($value);
        return $this;
    }

    /**
     * Sets cardholder name field.
     *
     * @param string|null $value
     */
    public function cardholderName(?string $value): self
    {
        $this->instance->setCardholderName($value);
        return $this;
    }

    /**
     * Sets verification token field.
     *
     * @param string|null $value
     */
    public function verificationToken(?string $value): self
    {
        $this->instance->setVerificationToken($value);
        return $this;
    }

    /**
     * Initializes a new Create Customer Card Request object.
     */
    public function build(): CreateCustomerCardRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
