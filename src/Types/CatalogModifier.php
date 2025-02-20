<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A modifier applicable to items at the time of sale. An example of a modifier is a Cheese add-on to a Burger item.
 */
class CatalogModifier extends JsonSerializableType
{
    /**
     * @var ?string $name The modifier name.  This is a searchable attribute for use in applicable query filters, and its value length is of Unicode code points.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?Money $priceMoney The modifier price.
     */
    #[JsonProperty('price_money')]
    private ?Money $priceMoney;

    /**
     * @var ?int $ordinal Determines where this `CatalogModifier` appears in the `CatalogModifierList`.
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * @var ?string $modifierListId The ID of the `CatalogModifierList` associated with this modifier.
     */
    #[JsonProperty('modifier_list_id')]
    private ?string $modifierListId;

    /**
     * @var ?array<ModifierLocationOverrides> $locationOverrides Location-specific price overrides.
     */
    #[JsonProperty('location_overrides'), ArrayType([ModifierLocationOverrides::class])]
    private ?array $locationOverrides;

    /**
     * The ID of the image associated with this `CatalogModifier` instance.
     * Currently this image is not displayed by Square, but is free to be displayed in 3rd party applications.
     *
     * @var ?string $imageId
     */
    #[JsonProperty('image_id')]
    private ?string $imageId;

    /**
     * @param array{
     *   name?: ?string,
     *   priceMoney?: ?Money,
     *   ordinal?: ?int,
     *   modifierListId?: ?string,
     *   locationOverrides?: ?array<ModifierLocationOverrides>,
     *   imageId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->priceMoney = $values['priceMoney'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
        $this->modifierListId = $values['modifierListId'] ?? null;
        $this->locationOverrides = $values['locationOverrides'] ?? null;
        $this->imageId = $values['imageId'] ?? null;
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
     * @return ?int
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param ?int $value
     */
    public function setOrdinal(?int $value = null): self
    {
        $this->ordinal = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getModifierListId(): ?string
    {
        return $this->modifierListId;
    }

    /**
     * @param ?string $value
     */
    public function setModifierListId(?string $value = null): self
    {
        $this->modifierListId = $value;
        return $this;
    }

    /**
     * @return ?array<ModifierLocationOverrides>
     */
    public function getLocationOverrides(): ?array
    {
        return $this->locationOverrides;
    }

    /**
     * @param ?array<ModifierLocationOverrides> $value
     */
    public function setLocationOverrides(?array $value = null): self
    {
        $this->locationOverrides = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getImageId(): ?string
    {
        return $this->imageId;
    }

    /**
     * @param ?string $value
     */
    public function setImageId(?string $value = null): self
    {
        $this->imageId = $value;
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
