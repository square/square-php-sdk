<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the `CreateOrder` endpoint.
 *
 * Either `errors` or `order` is present in a given response, but never both.
 */
class CreateOrderResponse extends JsonSerializableType
{
    /**
     * @var ?Order $order The newly created order.
     */
    #[JsonProperty('order')]
    private ?Order $order;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   order?: ?Order,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->order = $values['order'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?Order
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param ?Order $value
     */
    public function setOrder(?Order $value = null): self
    {
        $this->order = $value;
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
