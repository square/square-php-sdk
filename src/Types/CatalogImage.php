<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An image file to use in Square catalogs. It can be associated with
 * `CatalogItem`, `CatalogItemVariation`, `CatalogCategory`, and `CatalogModifierList` objects.
 * Only the images on items and item variations are exposed in Dashboard.
 * Only the first image on an item is displayed in Square Point of Sale (SPOS).
 * Images on items and variations are displayed through Square Online Store.
 * Images on other object types are for use by 3rd party application developers.
 */
class CatalogImage extends JsonSerializableType
{
    /**
     * The internal name to identify this image in calls to the Square API.
     * This is a searchable attribute for use in applicable query filters
     * using the [SearchCatalogObjects](api-endpoint:Catalog-SearchCatalogObjects).
     * It is not unique and should not be shown in a buyer facing context.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * The URL of this image, generated by Square after an image is uploaded
     * using the [CreateCatalogImage](api-endpoint:Catalog-CreateCatalogImage) endpoint.
     * To modify the image, use the UpdateCatalogImage endpoint. Do not change the URL field.
     *
     * @var ?string $url
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * A caption that describes what is shown in the image. Displayed in the
     * Square Online Store. This is a searchable attribute for use in applicable query filters
     * using the [SearchCatalogObjects](api-endpoint:Catalog-SearchCatalogObjects).
     *
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    private ?string $caption;

    /**
     * @var ?string $photoStudioOrderId The immutable order ID for this image object created by the Photo Studio service in Square Online Store.
     */
    #[JsonProperty('photo_studio_order_id')]
    private ?string $photoStudioOrderId;

    /**
     * @param array{
     *   name?: ?string,
     *   url?: ?string,
     *   caption?: ?string,
     *   photoStudioOrderId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->caption = $values['caption'] ?? null;
        $this->photoStudioOrderId = $values['photoStudioOrderId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param ?string $value
     */
    public function setUrl(?string $value = null): self
    {
        $this->url = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param ?string $value
     */
    public function setCaption(?string $value = null): self
    {
        $this->caption = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhotoStudioOrderId(): ?string
    {
        return $this->photoStudioOrderId;
    }

    /**
     * @param ?string $value
     */
    public function setPhotoStudioOrderId(?string $value = null): self
    {
        $this->photoStudioOrderId = $value;
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
