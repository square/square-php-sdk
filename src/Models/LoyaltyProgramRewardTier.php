<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a reward tier in a loyalty program. A reward tier defines how buyers can redeem points
 * for a reward, such as the number of points required and the value and scope of the discount. A
 * loyalty program can offer multiple reward tiers.
 */
class LoyaltyProgramRewardTier implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $points;

    /**
     * @var string
     */
    private $name;

    /**
     * @var LoyaltyProgramRewardDefinition
     */
    private $definition;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var CatalogObjectReference|null
     */
    private $pricingRuleReference;

    /**
     * @param string $id
     * @param int $points
     * @param string $name
     * @param LoyaltyProgramRewardDefinition $definition
     * @param string $createdAt
     */
    public function __construct(
        string $id,
        int $points,
        string $name,
        LoyaltyProgramRewardDefinition $definition,
        string $createdAt
    ) {
        $this->id = $id;
        $this->points = $points;
        $this->name = $name;
        $this->definition = $definition;
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the reward tier.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the reward tier.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Points.
     *
     * The points exchanged for the reward tier.
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * Sets Points.
     *
     * The points exchanged for the reward tier.
     *
     * @required
     * @maps points
     */
    public function setPoints(int $points): void
    {
        $this->points = $points;
    }

    /**
     * Returns Name.
     *
     * The name of the reward tier.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the reward tier.
     *
     * @required
     * @maps name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Definition.
     *
     * Provides details about the reward tier discount. DEPRECATED at version 2020-12-16. Discount details
     * are now defined using a catalog pricing rule and other catalog objects. For more information, see
     * [Get discount details for the reward](https://developer.squareup.com/docs/loyalty-api/overview#get-
     * discount-details).
     */
    public function getDefinition(): LoyaltyProgramRewardDefinition
    {
        return $this->definition;
    }

    /**
     * Sets Definition.
     *
     * Provides details about the reward tier discount. DEPRECATED at version 2020-12-16. Discount details
     * are now defined using a catalog pricing rule and other catalog objects. For more information, see
     * [Get discount details for the reward](https://developer.squareup.com/docs/loyalty-api/overview#get-
     * discount-details).
     *
     * @required
     * @maps definition
     */
    public function setDefinition(LoyaltyProgramRewardDefinition $definition): void
    {
        $this->definition = $definition;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the reward tier was created, in RFC 3339 format.
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the reward tier was created, in RFC 3339 format.
     *
     * @required
     * @maps created_at
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Pricing Rule Reference.
     *
     * A reference to a Catalog object at a specific version. In general this is
     * used as an entry point into a graph of catalog objects, where the objects exist
     * at a specific version.
     */
    public function getPricingRuleReference(): ?CatalogObjectReference
    {
        return $this->pricingRuleReference;
    }

    /**
     * Sets Pricing Rule Reference.
     *
     * A reference to a Catalog object at a specific version. In general this is
     * used as an entry point into a graph of catalog objects, where the objects exist
     * at a specific version.
     *
     * @maps pricing_rule_reference
     */
    public function setPricingRuleReference(?CatalogObjectReference $pricingRuleReference): void
    {
        $this->pricingRuleReference = $pricingRuleReference;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                         = $this->id;
        $json['points']                     = $this->points;
        $json['name']                       = $this->name;
        $json['definition']                 = $this->definition;
        $json['created_at']                 = $this->createdAt;
        if (isset($this->pricingRuleReference)) {
            $json['pricing_rule_reference'] = $this->pricingRuleReference;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
