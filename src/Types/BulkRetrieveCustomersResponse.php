<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields included in the response body from the
 * [BulkRetrieveCustomers](api-endpoint:Customers-BulkRetrieveCustomers) endpoint.
 */
class BulkRetrieveCustomersResponse extends JsonSerializableType
{
    /**
     * A map of responses that correspond to individual retrieve requests, represented by
     * key-value pairs.
     *
     * Each key is the customer ID that was specified for a retrieve request and each value
     * is the corresponding response.
     * If the request succeeds, the value is the requested customer profile.
     * If the request fails, the value contains any errors that occurred during the request.
     *
     * @var ?array<string, GetCustomerResponse> $responses
     */
    #[JsonProperty('responses'), ArrayType(['string' => GetCustomerResponse::class])]
    private ?array $responses;

    /**
     * @var ?array<Error> $errors Any top-level errors that prevented the bulk operation from running.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   responses?: ?array<string, GetCustomerResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->responses = $values['responses'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<string, GetCustomerResponse>
     */
    public function getResponses(): ?array
    {
        return $this->responses;
    }

    /**
     * @param ?array<string, GetCustomerResponse> $value
     */
    public function setResponses(?array $value = null): self
    {
        $this->responses = $value;
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
