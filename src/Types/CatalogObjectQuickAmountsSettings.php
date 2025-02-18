<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectQuickAmountsSettings extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogQuickAmountsSettings $quickAmountsSettingsData Structured data for a `CatalogQuickAmountsSettings`, set for CatalogObjects of type `QUICK_AMOUNTS_SETTINGS`.
     */
    #[JsonProperty('quick_amounts_settings_data')]
    private ?CatalogQuickAmountsSettings $quickAmountsSettingsData;

    /**
     * @param array{
     *   id: string,
     *   updatedAt?: ?string,
     *   version?: ?int,
     *   isDeleted?: ?bool,
     *   customAttributeValues?: ?array<string, CatalogCustomAttributeValue>,
     *   catalogV1Ids?: ?array<CatalogV1Id>,
     *   presentAtAllLocations?: ?bool,
     *   presentAtLocationIds?: ?array<string>,
     *   absentAtLocationIds?: ?array<string>,
     *   imageId?: ?string,
     *   quickAmountsSettingsData?: ?CatalogQuickAmountsSettings,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->isDeleted = $values['isDeleted'] ?? null;
        $this->customAttributeValues = $values['customAttributeValues'] ?? null;
        $this->catalogV1Ids = $values['catalogV1Ids'] ?? null;
        $this->presentAtAllLocations = $values['presentAtAllLocations'] ?? null;
        $this->presentAtLocationIds = $values['presentAtLocationIds'] ?? null;
        $this->absentAtLocationIds = $values['absentAtLocationIds'] ?? null;
        $this->imageId = $values['imageId'] ?? null;
        $this->quickAmountsSettingsData = $values['quickAmountsSettingsData'] ?? null;
    }

    /**
     * @return ?CatalogQuickAmountsSettings
     */
    public function getQuickAmountsSettingsData(): ?CatalogQuickAmountsSettings
    {
        return $this->quickAmountsSettingsData;
    }

    /**
     * @param ?CatalogQuickAmountsSettings $value
     */
    public function setQuickAmountsSettingsData(?CatalogQuickAmountsSettings $value = null): self
    {
        $this->quickAmountsSettingsData = $value;
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
