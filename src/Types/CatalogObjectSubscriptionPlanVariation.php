<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectSubscriptionPlanVariation extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogSubscriptionPlanVariation $subscriptionPlanVariationData Structured data for a `CatalogSubscriptionPlanVariation`, set for CatalogObjects of type `SUBSCRIPTION_PLAN_VARIATION`.
     */
    #[JsonProperty('subscription_plan_variation_data')]
    private ?CatalogSubscriptionPlanVariation $subscriptionPlanVariationData;

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
     *   subscriptionPlanVariationData?: ?CatalogSubscriptionPlanVariation,
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
        $this->subscriptionPlanVariationData = $values['subscriptionPlanVariationData'] ?? null;
    }

    /**
     * @return ?CatalogSubscriptionPlanVariation
     */
    public function getSubscriptionPlanVariationData(): ?CatalogSubscriptionPlanVariation
    {
        return $this->subscriptionPlanVariationData;
    }

    /**
     * @param ?CatalogSubscriptionPlanVariation $value
     */
    public function setSubscriptionPlanVariationData(?CatalogSubscriptionPlanVariation $value = null): self
    {
        $this->subscriptionPlanVariationData = $value;
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
