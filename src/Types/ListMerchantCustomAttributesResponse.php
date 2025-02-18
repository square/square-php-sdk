<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [ListMerchantCustomAttributes](api-endpoint:MerchantCustomAttributes-ListMerchantCustomAttributes) response.
 * Either `custom_attributes`, an empty object, or `errors` is present in the response. If additional
 * results are available, the `cursor` field is also present along with `custom_attributes`.
 */
class ListMerchantCustomAttributesResponse extends JsonSerializableType
{
    /**
     * The retrieved custom attributes. If `with_definitions` was set to `true` in the request,
     * the custom attribute definition is returned in the `definition` field of each custom attribute.
     * If no custom attributes are found, Square returns an empty object (`{}`).
     *
     * @var ?array<CustomAttribute> $customAttributes
     */
    #[JsonProperty('custom_attributes'), ArrayType([CustomAttribute::class])]
    private ?array $customAttributes;

    /**
     * The cursor to use in your next call to this endpoint to retrieve the next page of results
     * for your original request. This field is present only if the request succeeded and additional
     * results are available. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   customAttributes?: ?array<CustomAttribute>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<CustomAttribute>
     */
    public function getCustomAttributes(): ?array
    {
        return $this->customAttributes;
    }

    /**
     * @param ?array<CustomAttribute> $value
     */
    public function setCustomAttributes(?array $value = null): self
    {
        $this->customAttributes = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
