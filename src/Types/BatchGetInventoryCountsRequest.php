<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchGetInventoryCountsRequest extends JsonSerializableType
{
    /**
     * The filter to return results by `CatalogObject` ID.
     * The filter is applicable only when set.  The default is null.
     *
     * @var ?array<string> $catalogObjectIds
     */
    #[JsonProperty('catalog_object_ids'), ArrayType(['string'])]
    private ?array $catalogObjectIds;

    /**
     * The filter to return results by `Location` ID.
     * This filter is applicable only when set. The default is null.
     *
     * @var ?array<string> $locationIds
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * The filter to return results with their `calculated_at` value
     * after the given time as specified in an RFC 3339 timestamp.
     * The default value is the UNIX epoch of (`1970-01-01T00:00:00Z`).
     *
     * @var ?string $updatedAfter
     */
    #[JsonProperty('updated_after')]
    private ?string $updatedAfter;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for the original query.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for more information.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * The filter to return results by `InventoryState`. The filter is only applicable when set.
     * Ignored are untracked states of `NONE`, `SOLD`, and `UNLINKED_RETURN`.
     * The default is null.
     *
     * @var ?array<value-of<InventoryState>> $states
     */
    #[JsonProperty('states'), ArrayType(['string'])]
    private ?array $states;

    /**
     * @var ?int $limit The number of [records](entity:InventoryCount) to return.
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * @param array{
     *   catalogObjectIds?: ?array<string>,
     *   locationIds?: ?array<string>,
     *   updatedAfter?: ?string,
     *   cursor?: ?string,
     *   states?: ?array<value-of<InventoryState>>,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->catalogObjectIds = $values['catalogObjectIds'] ?? null;
        $this->locationIds = $values['locationIds'] ?? null;
        $this->updatedAfter = $values['updatedAfter'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->states = $values['states'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getCatalogObjectIds(): ?array
    {
        return $this->catalogObjectIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setCatalogObjectIds(?array $value = null): self
    {
        $this->catalogObjectIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setLocationIds(?array $value = null): self
    {
        $this->locationIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAfter(): ?string
    {
        return $this->updatedAfter;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAfter(?string $value = null): self
    {
        $this->updatedAfter = $value;
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
     * @return ?array<value-of<InventoryState>>
     */
    public function getStates(): ?array
    {
        return $this->states;
    }

    /**
     * @param ?array<value-of<InventoryState>> $value
     */
    public function setStates(?array $value = null): self
    {
        $this->states = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
