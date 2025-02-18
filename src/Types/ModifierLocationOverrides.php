<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Location-specific overrides for specified properties of a `CatalogModifier` object.
 */
class ModifierLocationOverrides extends JsonSerializableType
{
    /**
     * @var ?string $locationId The ID of the `Location` object representing the location. This can include a deactivated location.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The overridden price at the specified location. If this is unspecified, the modifier price is not overridden.
     * The modifier becomes free of charge at the specified location, when this `price_money` field is set to 0.
     *
     * @var ?Money $priceMoney
     */
    #[JsonProperty('price_money')]
    private ?Money $priceMoney;

    /**
     * Indicates whether the modifier is sold out at the specified location or not. As an example, for cheese (modifier) burger (item), when the modifier is sold out, it is the cheese, but not the burger, that is sold out.
     * The seller can manually set this sold out status. Attempts by an application to set this attribute are ignored.
     *
     * @var ?bool $soldOut
     */
    #[JsonProperty('sold_out')]
    private ?bool $soldOut;

    /**
     * @param array{
     *   locationId?: ?string,
     *   priceMoney?: ?Money,
     *   soldOut?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->priceMoney = $values['priceMoney'] ?? null;
        $this->soldOut = $values['soldOut'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
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
     * @return ?bool
     */
    public function getSoldOut(): ?bool
    {
        return $this->soldOut;
    }

    /**
     * @param ?bool $value
     */
    public function setSoldOut(?bool $value = null): self
    {
        $this->soldOut = $value;
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
