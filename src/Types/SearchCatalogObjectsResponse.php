<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class SearchCatalogObjectsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The pagination cursor to be used in a subsequent request. If unset, this is the final response.
     * See [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination) for more information.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<CatalogObject> $objects The CatalogObjects returned.
     */
    #[JsonProperty('objects'), ArrayType([CatalogObject::class])]
    private ?array $objects;

    /**
     * @var ?array<CatalogObject> $relatedObjects A list of CatalogObjects referenced by the objects in the `objects` field.
     */
    #[JsonProperty('related_objects'), ArrayType([CatalogObject::class])]
    private ?array $relatedObjects;

    /**
     * When the associated product catalog was last updated. Will
     * match the value for `end_time` or `cursor` if either field is included in the `SearchCatalog` request.
     *
     * @var ?string $latestTime
     */
    #[JsonProperty('latest_time')]
    private ?string $latestTime;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   cursor?: ?string,
     *   objects?: ?array<CatalogObject>,
     *   relatedObjects?: ?array<CatalogObject>,
     *   latestTime?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->objects = $values['objects'] ?? null;
        $this->relatedObjects = $values['relatedObjects'] ?? null;
        $this->latestTime = $values['latestTime'] ?? null;
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
     * @return ?array<CatalogObject>
     */
    public function getObjects(): ?array
    {
        return $this->objects;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setObjects(?array $value = null): self
    {
        $this->objects = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getRelatedObjects(): ?array
    {
        return $this->relatedObjects;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setRelatedObjects(?array $value = null): self
    {
        $this->relatedObjects = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLatestTime(): ?string
    {
        return $this->latestTime;
    }

    /**
     * @param ?string $value
     */
    public function setLatestTime(?string $value = null): self
    {
        $this->latestTime = $value;
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
