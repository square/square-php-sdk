<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the response returned by [CreatePayment](api-endpoint:Payments-CreatePayment).
 *
 * If there are errors processing the request, the `payment` field might not be
 * present, or it might be present with a status of `FAILED`.
 */
class CreatePaymentResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Payment $payment The newly created payment.
     */
    #[JsonProperty('payment')]
    private ?Payment $payment;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   payment?: ?Payment,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->payment = $values['payment'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?Payment
     */
    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    /**
     * @param ?Payment $value
     */
    public function setPayment(?Payment $value = null): self
    {
        $this->payment = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
