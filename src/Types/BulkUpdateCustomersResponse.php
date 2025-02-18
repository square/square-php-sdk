<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields included in the response body from the
 * [BulkUpdateCustomers](api-endpoint:Customers-BulkUpdateCustomers) endpoint.
 */
class BulkUpdateCustomersResponse extends JsonSerializableType
{
    /**
     * A map of responses that correspond to individual update requests, represented by
     * key-value pairs.
     *
     * Each key is the customer ID that was specified for an update request and each value
     * is the corresponding response.
     * If the request succeeds, the value is the updated customer profile.
     * If the request fails, the value contains any errors that occurred during the request.
     *
     * @var ?array<string, UpdateCustomerResponse> $responses
     */
    #[JsonProperty('responses'), ArrayType(['string' => UpdateCustomerResponse::class])]
    private ?array $responses;

    /**
     * @var ?array<Error> $errors Any top-level errors that prevented the bulk operation from running.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   responses?: ?array<string, UpdateCustomerResponse>,
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
     * @return ?array<string, UpdateCustomerResponse>
     */
    public function getResponses(): ?array
    {
        return $this->responses;
    }

    /**
     * @param ?array<string, UpdateCustomerResponse> $value
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
