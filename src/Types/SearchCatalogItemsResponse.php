<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the response body returned from the [SearchCatalogItems](api-endpoint:Catalog-SearchCatalogItems) endpoint.
 */
class SearchCatalogItemsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<CatalogObject> $items Returned items matching the specified query expressions.
     */
    #[JsonProperty('items'), ArrayType([CatalogObject::class])]
    private ?array $items;

    /**
     * @var ?string $cursor Pagination token used in the next request to return more of the search result.
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<string> $matchedVariationIds Ids of returned item variations matching the specified query expression.
     */
    #[JsonProperty('matched_variation_ids'), ArrayType(['string'])]
    private ?array $matchedVariationIds;

    /**
     * @var ?IncludedResources $includedResources Related resources included in the response as requested via include_options
     */
    #[JsonProperty('included_resources')]
    private ?IncludedResources $includedResources;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   items?: ?array<CatalogObject>,
     *   cursor?: ?string,
     *   matchedVariationIds?: ?array<string>,
     *   includedResources?: ?IncludedResources,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->items = $values['items'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->matchedVariationIds = $values['matchedVariationIds'] ?? null;
        $this->includedResources = $values['includedResources'] ?? null;
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
        $this->_setField('errors');
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setItems(?array $value = null): self
    {
        $this->items = $value;
        $this->_setField('items');
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
        $this->_setField('cursor');
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getMatchedVariationIds(): ?array
    {
        return $this->matchedVariationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setMatchedVariationIds(?array $value = null): self
    {
        $this->matchedVariationIds = $value;
        $this->_setField('matchedVariationIds');
        return $this;
    }

    /**
     * @return ?IncludedResources
     */
    public function getIncludedResources(): ?IncludedResources
    {
        return $this->includedResources;
    }

    /**
     * @param ?IncludedResources $value
     */
    public function setIncludedResources(?IncludedResources $value = null): self
    {
        $this->includedResources = $value;
        $this->_setField('includedResources');
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
