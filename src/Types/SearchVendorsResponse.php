<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an output from a call to [SearchVendors](api-endpoint:Vendors-SearchVendors).
 */
class SearchVendorsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors encountered when the request fails.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<Vendor> $vendors The [Vendor](entity:Vendor) objects matching the specified search filter.
     */
    #[JsonProperty('vendors'), ArrayType([Vendor::class])]
    private ?array $vendors;

    /**
     * The pagination cursor to be used in a subsequent request. If unset,
     * this is the final response.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for more information.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   vendors?: ?array<Vendor>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->vendors = $values['vendors'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
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
     * @return ?array<Vendor>
     */
    public function getVendors(): ?array
    {
        return $this->vendors;
    }

    /**
     * @param ?array<Vendor> $value
     */
    public function setVendors(?array $value = null): self
    {
        $this->vendors = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
