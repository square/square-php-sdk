<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes an ad hoc item and price to generate a quick pay checkout link.
 * For more information,
 * see [Quick Pay Checkout](https://developer.squareup.com/docs/checkout-api/quick-pay-checkout).
 */
class QuickPay extends JsonSerializableType
{
    /**
     * @var string $name The ad hoc item name. In the resulting `Order`, this name appears as the line item name.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var Money $priceMoney The price of the item.
     */
    #[JsonProperty('price_money')]
    private Money $priceMoney;

    /**
     * @var string $locationId The ID of the business location the checkout is associated with.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @param array{
     *   name: string,
     *   priceMoney: Money,
     *   locationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->priceMoney = $values['priceMoney'];
        $this->locationId = $values['locationId'];
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
     * @return Money
     */
    public function getPriceMoney(): Money
    {
        return $this->priceMoney;
    }

    /**
     * @param Money $value
     */
    public function setPriceMoney(Money $value): self
    {
        $this->priceMoney = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
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
