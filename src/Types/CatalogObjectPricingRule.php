<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectPricingRule extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * Structured data for a `CatalogPricingRule`, set for CatalogObjects of type `PRICING_RULE`.
     * A `CatalogPricingRule` object often works with a `CatalogProductSet` object or a `CatalogTimePeriod` object.
     *
     * @var ?CatalogPricingRule $pricingRuleData
     */
    #[JsonProperty('pricing_rule_data')]
    private ?CatalogPricingRule $pricingRuleData;

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
     *   pricingRuleData?: ?CatalogPricingRule,
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
        $this->pricingRuleData = $values['pricingRuleData'] ?? null;
    }

    /**
     * @return ?CatalogPricingRule
     */
    public function getPricingRuleData(): ?CatalogPricingRule
    {
        return $this->pricingRuleData;
    }

    /**
     * @param ?CatalogPricingRule $value
     */
    public function setPricingRuleData(?CatalogPricingRule $value = null): self
    {
        $this->pricingRuleData = $value;
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
