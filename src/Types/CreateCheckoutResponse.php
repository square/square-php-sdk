<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the `CreateCheckout` endpoint.
 */
class CreateCheckoutResponse extends JsonSerializableType
{
    /**
     * @var ?Checkout $checkout The newly created `checkout` object associated with the provided idempotency key.
     */
    #[JsonProperty('checkout')]
    private ?Checkout $checkout;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   checkout?: ?Checkout,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->checkout = $values['checkout'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?Checkout
     */
    public function getCheckout(): ?Checkout
    {
        return $this->checkout;
    }

    /**
     * @param ?Checkout $value
     */
    public function setCheckout(?Checkout $value = null): self
    {
        $this->checkout = $value;
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
