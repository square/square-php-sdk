<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body for requests to the `ListCustomerSegments` endpoint.
 *
 * Either `errors` or `segments` is present in a given response (never both).
 */
class ListCustomerSegmentsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<CustomerSegment> $segments The list of customer segments belonging to the associated Square account.
     */
    #[JsonProperty('segments'), ArrayType([CustomerSegment::class])]
    private ?array $segments;

    /**
     * A pagination cursor to be used in subsequent calls to `ListCustomerSegments`
     * to retrieve the next set of query results. The cursor is only present if the request succeeded and
     * additional results are available.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   segments?: ?array<CustomerSegment>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->segments = $values['segments'] ?? null;
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
     * @return ?array<CustomerSegment>
     */
    public function getSegments(): ?array
    {
        return $this->segments;
    }

    /**
     * @param ?array<CustomerSegment> $value
     */
    public function setSegments(?array $value = null): self
    {
        $this->segments = $value;
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
