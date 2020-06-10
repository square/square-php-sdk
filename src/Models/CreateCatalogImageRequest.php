<?php

declare(strict_types=1);

namespace Square\Models;

class CreateCatalogImageRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var string|null
     */
    private $objectId;

    /**
     * @var CatalogObject|null
     */
    private $image;

    /**
     * @param string $idempotencyKey
     */
    public function __construct(string $idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this CreateCatalogImage request.
     * Keys can be any valid string but must be unique for every CreateCatalogImage request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this CreateCatalogImage request.
     * Keys can be any valid string but must be unique for every CreateCatalogImage request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Object Id.
     *
     * Unique ID of the `CatalogObject` to attach to this `CatalogImage`. Leave this
     * field empty to create unattached images, for example if you are building an integration
     * where these images can be attached to catalog items at a later time.
     */
    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    /**
     * Sets Object Id.
     *
     * Unique ID of the `CatalogObject` to attach to this `CatalogImage`. Leave this
     * field empty to create unattached images, for example if you are building an integration
     * where these images can be attached to catalog items at a later time.
     *
     * @maps object_id
     */
    public function setObjectId(?string $objectId): void
    {
        $this->objectId = $objectId;
    }

    /**
     * Returns Image.
     */
    public function getImage(): ?CatalogObject
    {
        return $this->image;
    }

    /**
     * Sets Image.
     *
     * @maps image
     */
    public function setImage(?CatalogObject $image): void
    {
        $this->image = $image;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['object_id']      = $this->objectId;
        $json['image']          = $this->image;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
