<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CreateCatalogImageRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this CreateCatalogImage request.
     * Keys can be any valid string but must be unique for every CreateCatalogImage request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) for more information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * Unique ID of the `CatalogObject` to attach this `CatalogImage` object to. Leave this
     * field empty to create unattached images, for example if you are building an integration
     * where an image can be attached to catalog items at a later time.
     *
     * @var ?string $objectId
     */
    #[JsonProperty('object_id')]
    private ?string $objectId;

    /**
     * @var CatalogObject $image The new `CatalogObject` of the `IMAGE` type, namely, a `CatalogImage` object, to encapsulate the specified image file.
     */
    #[JsonProperty('image')]
    private CatalogObject $image;

    /**
     * If this is set to `true`, the image created will be the primary, or first image of the object referenced by `object_id`.
     * If the `CatalogObject` already has a primary `CatalogImage`, setting this field to `true` will replace the primary image.
     * If this is set to `false` and you use the Square API version 2021-12-15 or later, the image id will be appended to the list of `image_ids` on the object.
     *
     * With Square API version 2021-12-15 or later, the default value is `false`. Otherwise, the effective default value is `true`.
     *
     * @var ?bool $isPrimary
     */
    #[JsonProperty('is_primary')]
    private ?bool $isPrimary;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   image: CatalogObject,
     *   objectId?: ?string,
     *   isPrimary?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->objectId = $values['objectId'] ?? null;
        $this->image = $values['image'];
        $this->isPrimary = $values['isPrimary'] ?? null;
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
     * @return CatalogObject
     */
    public function getImage(): CatalogObject
    {
        return $this->image;
    }

    /**
     * @param CatalogObject $value
     */
    public function setImage(CatalogObject $value): self
    {
        $this->image = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsPrimary(): ?bool
    {
        return $this->isPrimary;
    }

    /**
     * @param ?bool $value
     */
    public function setIsPrimary(?bool $value = null): self
    {
        $this->isPrimary = $value;
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
