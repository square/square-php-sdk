<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1Item
 */
class V1Item implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var string|null
     */
    private $abbreviation;

    /**
     * @var string|null
     */
    private $visibility;

    /**
     * @var bool|null
     */
    private $availableOnline;

    /**
     * @var V1ItemImage|null
     */
    private $masterImage;

    /**
     * @var V1Category|null
     */
    private $category;

    /**
     * @var V1Variation[]|null
     */
    private $variations;

    /**
     * @var V1ModifierList[]|null
     */
    private $modifierLists;

    /**
     * @var V1Fee[]|null
     */
    private $fees;

    /**
     * @var bool|null
     */
    private $taxable;

    /**
     * @var string|null
     */
    private $categoryId;

    /**
     * @var bool|null
     */
    private $availableForPickup;

    /**
     * @var string|null
     */
    private $v2Id;

    /**
     * Returns Id.
     *
     * The item's ID. Must be unique among all entity IDs ever provided on behalf of the merchant. You can
     * never reuse an ID. This value can include alphanumeric characters, dashes (-), and underscores (_).
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The item's ID. Must be unique among all entity IDs ever provided on behalf of the merchant. You can
     * never reuse an ID. This value can include alphanumeric characters, dashes (-), and underscores (_).
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The item's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The item's name.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Description.
     *
     * The item's description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The item's description.
     *
     * @maps description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns Type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Color.
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * Sets Color.
     *
     * @maps color
     */
    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    /**
     * Returns Abbreviation.
     *
     * The text of the item's display label in Square Point of Sale. Only up to the first five characters
     * of the string are used.
     */
    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    /**
     * Sets Abbreviation.
     *
     * The text of the item's display label in Square Point of Sale. Only up to the first five characters
     * of the string are used.
     *
     * @maps abbreviation
     */
    public function setAbbreviation(?string $abbreviation): void
    {
        $this->abbreviation = $abbreviation;
    }

    /**
     * Returns Visibility.
     */
    public function getVisibility(): ?string
    {
        return $this->visibility;
    }

    /**
     * Sets Visibility.
     *
     * @maps visibility
     */
    public function setVisibility(?string $visibility): void
    {
        $this->visibility = $visibility;
    }

    /**
     * Returns Available Online.
     *
     * If true, the item can be added to shipping orders from the merchant's online store.
     */
    public function getAvailableOnline(): ?bool
    {
        return $this->availableOnline;
    }

    /**
     * Sets Available Online.
     *
     * If true, the item can be added to shipping orders from the merchant's online store.
     *
     * @maps available_online
     */
    public function setAvailableOnline(?bool $availableOnline): void
    {
        $this->availableOnline = $availableOnline;
    }

    /**
     * Returns Master Image.
     *
     * V1ItemImage
     */
    public function getMasterImage(): ?V1ItemImage
    {
        return $this->masterImage;
    }

    /**
     * Sets Master Image.
     *
     * V1ItemImage
     *
     * @maps master_image
     */
    public function setMasterImage(?V1ItemImage $masterImage): void
    {
        $this->masterImage = $masterImage;
    }

    /**
     * Returns Category.
     *
     * V1Category
     */
    public function getCategory(): ?V1Category
    {
        return $this->category;
    }

    /**
     * Sets Category.
     *
     * V1Category
     *
     * @maps category
     */
    public function setCategory(?V1Category $category): void
    {
        $this->category = $category;
    }

    /**
     * Returns Variations.
     *
     * The item's variations. You must specify at least one variation.
     *
     * @return V1Variation[]|null
     */
    public function getVariations(): ?array
    {
        return $this->variations;
    }

    /**
     * Sets Variations.
     *
     * The item's variations. You must specify at least one variation.
     *
     * @maps variations
     *
     * @param V1Variation[]|null $variations
     */
    public function setVariations(?array $variations): void
    {
        $this->variations = $variations;
    }

    /**
     * Returns Modifier Lists.
     *
     * The modifier lists that apply to the item, if any.
     *
     * @return V1ModifierList[]|null
     */
    public function getModifierLists(): ?array
    {
        return $this->modifierLists;
    }

    /**
     * Sets Modifier Lists.
     *
     * The modifier lists that apply to the item, if any.
     *
     * @maps modifier_lists
     *
     * @param V1ModifierList[]|null $modifierLists
     */
    public function setModifierLists(?array $modifierLists): void
    {
        $this->modifierLists = $modifierLists;
    }

    /**
     * Returns Fees.
     *
     * The fees that apply to the item, if any.
     *
     * @return V1Fee[]|null
     */
    public function getFees(): ?array
    {
        return $this->fees;
    }

    /**
     * Sets Fees.
     *
     * The fees that apply to the item, if any.
     *
     * @maps fees
     *
     * @param V1Fee[]|null $fees
     */
    public function setFees(?array $fees): void
    {
        $this->fees = $fees;
    }

    /**
     * Returns Taxable.
     *
     * Deprecated. This field is not used.
     */
    public function getTaxable(): ?bool
    {
        return $this->taxable;
    }

    /**
     * Sets Taxable.
     *
     * Deprecated. This field is not used.
     *
     * @maps taxable
     */
    public function setTaxable(?bool $taxable): void
    {
        $this->taxable = $taxable;
    }

    /**
     * Returns Category Id.
     *
     * The ID of the item's category, if any.
     */
    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    /**
     * Sets Category Id.
     *
     * The ID of the item's category, if any.
     *
     * @maps category_id
     */
    public function setCategoryId(?string $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Returns Available for Pickup.
     *
     * If true, the item can be added to pickup orders from the merchant's online store. Default value:
     * false
     */
    public function getAvailableForPickup(): ?bool
    {
        return $this->availableForPickup;
    }

    /**
     * Sets Available for Pickup.
     *
     * If true, the item can be added to pickup orders from the merchant's online store. Default value:
     * false
     *
     * @maps available_for_pickup
     */
    public function setAvailableForPickup(?bool $availableForPickup): void
    {
        $this->availableForPickup = $availableForPickup;
    }

    /**
     * Returns V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     */
    public function getV2Id(): ?string
    {
        return $this->v2Id;
    }

    /**
     * Sets V 2 Id.
     *
     * The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations
     * share the same v2 ID.
     *
     * @maps v2_id
     */
    public function setV2Id(?string $v2Id): void
    {
        $this->v2Id = $v2Id;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                 = $this->id;
        $json['name']               = $this->name;
        $json['description']        = $this->description;
        $json['type']               = $this->type;
        $json['color']              = $this->color;
        $json['abbreviation']       = $this->abbreviation;
        $json['visibility']         = $this->visibility;
        $json['available_online']   = $this->availableOnline;
        $json['master_image']       = $this->masterImage;
        $json['category']           = $this->category;
        $json['variations']         = $this->variations;
        $json['modifier_lists']     = $this->modifierLists;
        $json['fees']               = $this->fees;
        $json['taxable']            = $this->taxable;
        $json['category_id']        = $this->categoryId;
        $json['available_for_pickup'] = $this->availableForPickup;
        $json['v2_id']              = $this->v2Id;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
