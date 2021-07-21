<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A mapping between a temporary client-supplied ID and a permanent server-generated ID.
 *
 * When calling [UpsertCatalogObject]($e/Catalog/UpsertCatalogObject) or
 * [BatchUpsertCatalogObjects]($e/Catalog/BatchUpsertCatalogObjects) to
 * create a [CatalogObject]($m/CatalogObject) instance, you can supply
 * a temporary ID for the to-be-created object, especially when the object is to be referenced
 * elsewhere in the same request body. This temporary ID can be any string unique within
 * the call, but must be prefixed by "#".
 *
 * After the request is submitted and the object created, a permanent server-generated ID is assigned
 * to the new object. The permanent ID is unique across the Square catalog.
 */
class CatalogIdMapping implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $clientObjectId;

    /**
     * @var string|null
     */
    private $objectId;

    /**
     * Returns Client Object Id.
     *
     * The client-supplied temporary `#`-prefixed ID for a new `CatalogObject`.
     */
    public function getClientObjectId(): ?string
    {
        return $this->clientObjectId;
    }

    /**
     * Sets Client Object Id.
     *
     * The client-supplied temporary `#`-prefixed ID for a new `CatalogObject`.
     *
     * @maps client_object_id
     */
    public function setClientObjectId(?string $clientObjectId): void
    {
        $this->clientObjectId = $clientObjectId;
    }

    /**
     * Returns Object Id.
     *
     * The permanent ID for the CatalogObject created by the server.
     */
    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    /**
     * Sets Object Id.
     *
     * The permanent ID for the CatalogObject created by the server.
     *
     * @maps object_id
     */
    public function setObjectId(?string $objectId): void
    {
        $this->objectId = $objectId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->clientObjectId)) {
            $json['client_object_id'] = $this->clientObjectId;
        }
        if (isset($this->objectId)) {
            $json['object_id']        = $this->objectId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
