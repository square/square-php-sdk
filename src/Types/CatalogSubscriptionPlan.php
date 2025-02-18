<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes a subscription plan. A subscription plan represents what you want to sell in a subscription model, and includes references to each of the associated subscription plan variations.
 * For more information, see [Subscription Plans and Variations](https://developer.squareup.com/docs/subscriptions-api/plans-and-variations).
 */
class CatalogSubscriptionPlan extends JsonSerializableType
{
    /**
     * @var string $name The name of the plan.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * A list of SubscriptionPhase containing the [SubscriptionPhase](entity:SubscriptionPhase) for this plan.
     * This field it required. Not including this field will throw a REQUIRED_FIELD_MISSING error
     *
     * @var ?array<SubscriptionPhase> $phases
     */
    #[JsonProperty('phases'), ArrayType([SubscriptionPhase::class])]
    private ?array $phases;

    /**
     * @var ?array<CatalogObject> $subscriptionPlanVariations The list of subscription plan variations available for this product
     */
    #[JsonProperty('subscription_plan_variations'), ArrayType([CatalogObject::class])]
    private ?array $subscriptionPlanVariations;

    /**
     * @var ?array<string> $eligibleItemIds The list of IDs of `CatalogItems` that are eligible for subscription by this SubscriptionPlan's variations.
     */
    #[JsonProperty('eligible_item_ids'), ArrayType(['string'])]
    private ?array $eligibleItemIds;

    /**
     * @var ?array<string> $eligibleCategoryIds The list of IDs of `CatalogCategory` that are eligible for subscription by this SubscriptionPlan's variations.
     */
    #[JsonProperty('eligible_category_ids'), ArrayType(['string'])]
    private ?array $eligibleCategoryIds;

    /**
     * @var ?bool $allItems If true, all items in the merchant's catalog are subscribable by this SubscriptionPlan.
     */
    #[JsonProperty('all_items')]
    private ?bool $allItems;

    /**
     * @param array{
     *   name: string,
     *   phases?: ?array<SubscriptionPhase>,
     *   subscriptionPlanVariations?: ?array<CatalogObject>,
     *   eligibleItemIds?: ?array<string>,
     *   eligibleCategoryIds?: ?array<string>,
     *   allItems?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->phases = $values['phases'] ?? null;
        $this->subscriptionPlanVariations = $values['subscriptionPlanVariations'] ?? null;
        $this->eligibleItemIds = $values['eligibleItemIds'] ?? null;
        $this->eligibleCategoryIds = $values['eligibleCategoryIds'] ?? null;
        $this->allItems = $values['allItems'] ?? null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?array<SubscriptionPhase>
     */
    public function getPhases(): ?array
    {
        return $this->phases;
    }

    /**
     * @param ?array<SubscriptionPhase> $value
     */
    public function setPhases(?array $value = null): self
    {
        $this->phases = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getSubscriptionPlanVariations(): ?array
    {
        return $this->subscriptionPlanVariations;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setSubscriptionPlanVariations(?array $value = null): self
    {
        $this->subscriptionPlanVariations = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getEligibleItemIds(): ?array
    {
        return $this->eligibleItemIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setEligibleItemIds(?array $value = null): self
    {
        $this->eligibleItemIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getEligibleCategoryIds(): ?array
    {
        return $this->eligibleCategoryIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setEligibleCategoryIds(?array $value = null): self
    {
        $this->eligibleCategoryIds = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAllItems(): ?bool
    {
        return $this->allItems;
    }

    /**
     * @param ?bool $value
     */
    public function setAllItems(?bool $value = null): self
    {
        $this->allItems = $value;
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
