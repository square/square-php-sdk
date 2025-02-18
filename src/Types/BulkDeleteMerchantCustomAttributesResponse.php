<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [BulkDeleteMerchantCustomAttributes](api-endpoint:MerchantCustomAttributes-BulkDeleteMerchantCustomAttributes) response,
 * which contains a map of responses that each corresponds to an individual delete request.
 */
class BulkDeleteMerchantCustomAttributesResponse extends JsonSerializableType
{
    /**
     * A map of responses that correspond to individual delete requests. Each response has the
     * same key as the corresponding request.
     *
     * @var array<string, BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse::class])]
    private array $values;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   values: array<string, BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return array<string, BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BulkDeleteMerchantCustomAttributesResponseMerchantCustomAttributeDeleteResponse> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
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
