<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Traits\CatalogObjectBase;
use Square\Core\Json\JsonProperty;

class CatalogObjectSubscriptionPlan extends JsonSerializableType
{
    use CatalogObjectBase;

    /**
     * @var ?CatalogSubscriptionPlan $subscriptionPlanData Structured data for a `CatalogSubscriptionPlan`, set for CatalogObjects of type `SUBSCRIPTION_PLAN`.
     */
    #[JsonProperty('subscription_plan_data')]
    private ?CatalogSubscriptionPlan $subscriptionPlanData;

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
     *   subscriptionPlanData?: ?CatalogSubscriptionPlan,
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
        $this->subscriptionPlanData = $values['subscriptionPlanData'] ?? null;
    }

    /**
     * @return ?CatalogSubscriptionPlan
     */
    public function getSubscriptionPlanData(): ?CatalogSubscriptionPlan
    {
        return $this->subscriptionPlanData;
    }

    /**
     * @param ?CatalogSubscriptionPlan $value
     */
    public function setSubscriptionPlanData(?CatalogSubscriptionPlan $value = null): self
    {
        $this->subscriptionPlanData = $value;
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
