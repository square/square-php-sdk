<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a reward tier in a loyalty program. A reward tier defines how buyers can redeem points for a reward, such as the number of points required and the value and scope of the discount. A loyalty program can offer multiple reward tiers.
 */
class LoyaltyProgramRewardTier extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the reward tier.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var int $points The points exchanged for the reward tier.
     */
    #[JsonProperty('points')]
    private int $points;

    /**
     * @var ?string $name The name of the reward tier.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $createdAt The timestamp when the reward tier was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * A reference to the specific version of a `PRICING_RULE` catalog object that contains information about the reward tier discount.
     *
     * Use `object_id` and `catalog_version` with the [RetrieveCatalogObject](api-endpoint:Catalog-RetrieveCatalogObject) endpoint
     * to get discount details. Make sure to set `include_related_objects` to true in the request to retrieve all catalog objects
     * that define the discount. For more information, see [Getting discount details for a reward tier](https://developer.squareup.com/docs/loyalty-api/loyalty-rewards#get-discount-details).
     *
     * @var CatalogObjectReference $pricingRuleReference
     */
    #[JsonProperty('pricing_rule_reference')]
    private CatalogObjectReference $pricingRuleReference;

    /**
     * @param array{
     *   points: int,
     *   pricingRuleReference: CatalogObjectReference,
     *   id?: ?string,
     *   name?: ?string,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->points = $values['points'];
        $this->name = $values['name'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->pricingRuleReference = $values['pricingRuleReference'];
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $value
     */
    public function setPoints(int $value): self
    {
        $this->points = $value;
        return $this;
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
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return CatalogObjectReference
     */
    public function getPricingRuleReference(): CatalogObjectReference
    {
        return $this->pricingRuleReference;
    }

    /**
     * @param CatalogObjectReference $value
     */
    public function setPricingRuleReference(CatalogObjectReference $value): self
    {
        $this->pricingRuleReference = $value;
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
