<?php

namespace Square\Catalog\Object\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\CatalogObject;

class UpsertCatalogObjectRequest extends JsonSerializableType
{
    /**
     * A value you specify that uniquely identifies this
     * request among all your requests. A common way to create
     * a valid idempotency key is to use a Universally unique
     * identifier (UUID).
     *
     * If you're unsure whether a particular request was successful,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate objects.
     *
     * See [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) for more information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * A CatalogObject to be created or updated.
     *
     * - For updates, the object must be active (the `is_deleted` field is not `true`).
     * - For creates, the object ID must start with `#`. The provided ID is replaced with a server-generated ID.
     *
     * @var CatalogObject $object
     */
    #[JsonProperty('object')]
    private CatalogObject $object;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   object: CatalogObject,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->object = $values['object'];
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return CatalogObject
     */
    public function getObject(): CatalogObject
    {
        return $this->object;
    }

    /**
     * @param CatalogObject $value
     */
    public function setObject(CatalogObject $value): self
    {
        $this->object = $value;
        return $this;
    }
}
