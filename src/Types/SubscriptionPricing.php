<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes the pricing for the subscription.
 */
class SubscriptionPricing extends JsonSerializableType
{
    /**
     * RELATIVE or STATIC
     * See [SubscriptionPricingType](#type-subscriptionpricingtype) for possible values
     *
     * @var ?value-of<SubscriptionPricingType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?array<string> $discountIds The ids of the discount catalog objects
     */
    #[JsonProperty('discount_ids'), ArrayType(['string'])]
    private ?array $discountIds;

    /**
     * @var ?Money $priceMoney The price of the subscription, if STATIC
     */
    #[JsonProperty('price_money')]
    private ?Money $priceMoney;

    /**
     * @param array{
     *   type?: ?value-of<SubscriptionPricingType>,
     *   discountIds?: ?array<string>,
     *   priceMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->discountIds = $values['discountIds'] ?? null;
        $this->priceMoney = $values['priceMoney'] ?? null;
    }

    /**
     * @return ?value-of<SubscriptionPricingType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<SubscriptionPricingType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getDiscountIds(): ?array
    {
        return $this->discountIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setDiscountIds(?array $value = null): self
    {
        $this->discountIds = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getPriceMoney(): ?Money
    {
        return $this->priceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setPriceMoney(?Money $value = null): self
    {
        $this->priceMoney = $value;
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
