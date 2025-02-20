<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an output from a call to [BulkRetrieveVendors](api-endpoint:Vendors-BulkRetrieveVendors).
 */
class BatchGetVendorsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The set of [RetrieveVendorResponse](entity:RetrieveVendorResponse) objects encapsulating successfully retrieved [Vendor](entity:Vendor)
     * objects or error responses for failed attempts. The set is represented by
     * a collection of `Vendor`-ID/`Vendor`-object or `Vendor`-ID/error-object pairs.
     *
     * @var ?array<string, GetVendorResponse> $responses
     */
    #[JsonProperty('responses'), ArrayType(['string' => GetVendorResponse::class])]
    private ?array $responses;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   responses?: ?array<string, GetVendorResponse>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->responses = $values['responses'] ?? null;
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
     * @return ?array<string, GetVendorResponse>
     */
    public function getResponses(): ?array
    {
        return $this->responses;
    }

    /**
     * @param ?array<string, GetVendorResponse> $value
     */
    public function setResponses(?array $value = null): self
    {
        $this->responses = $value;
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
