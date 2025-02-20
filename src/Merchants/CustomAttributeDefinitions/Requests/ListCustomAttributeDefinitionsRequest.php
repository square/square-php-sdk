<?php

namespace Square\Merchants\CustomAttributeDefinitions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\VisibilityFilter;

class ListCustomAttributeDefinitionsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<VisibilityFilter> $visibilityFilter Filters the `CustomAttributeDefinition` results by their `visibility` values.
     */
    private ?string $visibilityFilter;

    /**
     * The maximum number of results to return in a single paged response. This limit is advisory.
     * The response might contain more or fewer results. The minimum value is 1 and the maximum value is 100.
     * The default value is 20. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * The cursor returned in the paged response from the previous call to this endpoint.
     * Provide this cursor to retrieve the next page of results for your original request.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * @param array{
     *   visibilityFilter?: ?value-of<VisibilityFilter>,
     *   limit?: ?int,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->visibilityFilter = $values['visibilityFilter'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return ?value-of<VisibilityFilter>
     */
    public function getVisibilityFilter(): ?string
    {
        return $this->visibilityFilter;
    }

    /**
     * @param ?value-of<VisibilityFilter> $value
     */
    public function setVisibilityFilter(?string $value = null): self
    {
        $this->visibilityFilter = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
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
}
