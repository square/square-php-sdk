<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class DeleteCatalogObjectResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The IDs of all catalog objects deleted by this request.
     * Multiple IDs may be returned when associated objects are also deleted, for example
     * a catalog item variation will be deleted (and its ID included in this field)
     * when its parent catalog item is deleted.
     *
     * @var ?array<string> $deletedObjectIds
     */
    #[JsonProperty('deleted_object_ids'), ArrayType(['string'])]
    private ?array $deletedObjectIds;

    /**
     * The database [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * of this deletion in RFC 3339 format, e.g., `2016-09-04T23:59:33.123Z`.
     *
     * @var ?string $deletedAt
     */
    #[JsonProperty('deleted_at')]
    private ?string $deletedAt;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   deletedObjectIds?: ?array<string>,
     *   deletedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->deletedObjectIds = $values['deletedObjectIds'] ?? null;
        $this->deletedAt = $values['deletedAt'] ?? null;
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
     * @return ?array<string>
     */
    public function getDeletedObjectIds(): ?array
    {
        return $this->deletedObjectIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setDeletedObjectIds(?array $value = null): self
    {
        $this->deletedObjectIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeletedAt(): ?string
    {
        return $this->deletedAt;
    }

    /**
     * @param ?string $value
     */
    public function setDeletedAt(?string $value = null): self
    {
        $this->deletedAt = $value;
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
