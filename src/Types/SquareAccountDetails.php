<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Additional details about Square Account payments.
 */
class SquareAccountDetails extends JsonSerializableType
{
    /**
     * @var ?string $paymentSourceToken Unique identifier for the payment source used for this payment.
     */
    #[JsonProperty('payment_source_token')]
    private ?string $paymentSourceToken;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   paymentSourceToken?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentSourceToken = $values['paymentSourceToken'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getPaymentSourceToken(): ?string
    {
        return $this->paymentSourceToken;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentSourceToken(?string $value = null): self
    {
        $this->paymentSourceToken = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
