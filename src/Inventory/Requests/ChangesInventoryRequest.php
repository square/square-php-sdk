<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;

class ChangesInventoryRequest extends JsonSerializableType
{
    /**
     * @var string $catalogObjectId ID of the [CatalogObject](entity:CatalogObject) to retrieve.
     */
    private string $catalogObjectId;

    /**
     * The [Location](entity:Location) IDs to look up as a comma-separated
     * list. An empty list queries all locations.
     *
     * @var ?string $locationIds
     */
    private ?string $locationIds;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for the original query.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for more information.
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * @param array{
     *   catalogObjectId: string,
     *   locationIds?: ?string,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->catalogObjectId = $values['catalogObjectId'];
        $this->locationIds = $values['locationIds'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return string
     */
    public function getCatalogObjectId(): string
    {
        return $this->catalogObjectId;
    }

    /**
     * @param string $value
     */
    public function setCatalogObjectId(string $value): self
    {
        $this->catalogObjectId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationIds(): ?string
    {
        return $this->locationIds;
    }

    /**
     * @param ?string $value
     */
    public function setLocationIds(?string $value = null): self
    {
        $this->locationIds = $value;
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
