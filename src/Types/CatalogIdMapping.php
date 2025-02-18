<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A mapping between a temporary client-supplied ID and a permanent server-generated ID.
 *
 * When calling [UpsertCatalogObject](api-endpoint:Catalog-UpsertCatalogObject) or
 * [BatchUpsertCatalogObjects](api-endpoint:Catalog-BatchUpsertCatalogObjects) to
 * create a [CatalogObject](entity:CatalogObject) instance, you can supply
 * a temporary ID for the to-be-created object, especially when the object is to be referenced
 * elsewhere in the same request body. This temporary ID can be any string unique within
 * the call, but must be prefixed by "#".
 *
 * After the request is submitted and the object created, a permanent server-generated ID is assigned
 * to the new object. The permanent ID is unique across the Square catalog.
 */
class CatalogIdMapping extends JsonSerializableType
{
    /**
     * @var ?string $clientObjectId The client-supplied temporary `#`-prefixed ID for a new `CatalogObject`.
     */
    #[JsonProperty('client_object_id')]
    private ?string $clientObjectId;

    /**
     * @var ?string $objectId The permanent ID for the CatalogObject created by the server.
     */
    #[JsonProperty('object_id')]
    private ?string $objectId;

    /**
     * @param array{
     *   clientObjectId?: ?string,
     *   objectId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clientObjectId = $values['clientObjectId'] ?? null;
        $this->objectId = $values['objectId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getClientObjectId(): ?string
    {
        return $this->clientObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setClientObjectId(?string $value = null): self
    {
        $this->clientObjectId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    /**
     * @param ?string $value
     */
    public function setObjectId(?string $value = null): self
    {
        $this->objectId = $value;
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
