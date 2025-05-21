<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A [CatalogObject](entity:CatalogObject) instance of the `ITEM` type, also referred to as an item, in the catalog.
 */
class CatalogItem extends JsonSerializableType
{
    /**
     * @var ?string $name The item's name. This is a searchable attribute for use in applicable query filters, its value must not be empty, and the length is of Unicode code points.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * The item's description. This is a searchable attribute for use in applicable query filters, and its value length is of Unicode code points.
     *
     * Deprecated at 2022-07-20, this field is planned to retire in 6 months. You should migrate to use `description_html` to set the description
     * of the [CatalogItem](entity:CatalogItem) instance.  The `description` and `description_html` field values are kept in sync. If you try to
     * set the both fields, the `description_html` text value overwrites the `description` value. Updates in one field are also reflected in the other,
     * except for when you use an early version before Square API 2022-07-20 and `description_html` is set to blank, setting the `description` value to null
     * does not nullify `description_html`.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * The text of the item's display label in the Square Point of Sale app. Only up to the first five characters of the string are used.
     * This attribute is searchable, and its value length is of Unicode code points.
     *
     * @var ?string $abbreviation
     */
    #[JsonProperty('abbreviation')]
    private ?string $abbreviation;

    /**
     * @var ?string $labelColor The color of the item's display label in the Square Point of Sale app. This must be a valid hex color code.
     */
    #[JsonProperty('label_color')]
    private ?string $labelColor;

    /**
     * @var ?bool $isTaxable Indicates whether the item is taxable (`true`) or non-taxable (`false`). Default is `true`.
     */
    #[JsonProperty('is_taxable')]
    private ?bool $isTaxable;

    /**
     * @var ?string $categoryId The ID of the item's category, if any. Deprecated since 2023-12-13. Use `CatalogItem.categories`, instead.
     */
    #[JsonProperty('category_id')]
    private ?string $categoryId;

    /**
     * A set of IDs indicating the taxes enabled for
     * this item. When updating an item, any taxes listed here will be added to the item.
     * Taxes may also be added to or deleted from an item using `UpdateItemTaxes`.
     *
     * @var ?array<string> $taxIds
     */
    #[JsonProperty('tax_ids'), ArrayType(['string'])]
    private ?array $taxIds;

    /**
     * A set of `CatalogItemModifierListInfo` objects
     * representing the modifier lists that apply to this item, along with the overrides and min
     * and max limits that are specific to this item. Modifier lists
     * may also be added to or deleted from an item using `UpdateItemModifierLists`.
     *
     * @var ?array<CatalogItemModifierListInfo> $modifierListInfo
     */
    #[JsonProperty('modifier_list_info'), ArrayType([CatalogItemModifierListInfo::class])]
    private ?array $modifierListInfo;

    /**
     * A list of [CatalogItemVariation](entity:CatalogItemVariation) objects for this item. An item must have
     * at least one variation.
     *
     * @var ?array<CatalogObject> $variations
     */
    #[JsonProperty('variations'), ArrayType([CatalogObject::class])]
    private ?array $variations;

    /**
     * The product type of the item. Once set, the `product_type` value cannot be modified.
     *
     * Items of the `LEGACY_SQUARE_ONLINE_SERVICE` and `LEGACY_SQUARE_ONLINE_MEMBERSHIP` product types can be updated
     * but cannot be created using the API.
     * See [CatalogItemProductType](#type-catalogitemproducttype) for possible values
     *
     * @var ?value-of<CatalogItemProductType> $productType
     */
    #[JsonProperty('product_type')]
    private ?string $productType;

    /**
     * If `false`, the Square Point of Sale app will present the `CatalogItem`'s
     * details screen immediately, allowing the merchant to choose `CatalogModifier`s
     * before adding the item to the cart.  This is the default behavior.
     *
     * If `true`, the Square Point of Sale app will immediately add the item to the cart with the pre-selected
     * modifiers, and merchants can edit modifiers by drilling down onto the item's details.
     *
     * Third-party clients are encouraged to implement similar behaviors.
     *
     * @var ?bool $skipModifierScreen
     */
    #[JsonProperty('skip_modifier_screen')]
    private ?bool $skipModifierScreen;

    /**
     * List of item options IDs for this item. Used to manage and group item
     * variations in a specified order.
     *
     * Maximum: 6 item options.
     *
     * @var ?array<CatalogItemOptionForItem> $itemOptions
     */
    #[JsonProperty('item_options'), ArrayType([CatalogItemOptionForItem::class])]
    private ?array $itemOptions;

    /**
     * @var ?string $ecomUri Deprecated. A URI pointing to a published e-commerce product page for the Item.
     */
    #[JsonProperty('ecom_uri')]
    private ?string $ecomUri;

    /**
     * @var ?array<string> $ecomImageUris Deprecated. A comma-separated list of encoded URIs pointing to a set of published e-commerce images for the Item.
     */
    #[JsonProperty('ecom_image_uris'), ArrayType(['string'])]
    private ?array $ecomImageUris;

    /**
     * The IDs of images associated with this `CatalogItem` instance.
     * These images will be shown to customers in Square Online Store.
     * The first image will show up as the icon for this item in POS.
     *
     * @var ?array<string> $imageIds
     */
    #[JsonProperty('image_ids'), ArrayType(['string'])]
    private ?array $imageIds;

    /**
     * A name to sort the item by. If this name is unspecified, namely, the `sort_name` field is absent, the regular `name` field is used for sorting.
     * Its value must not be empty.
     *
     * It is currently supported for sellers of the Japanese locale only.
     *
     * @var ?string $sortName
     */
    #[JsonProperty('sort_name')]
    private ?string $sortName;

    /**
     * @var ?array<CatalogObjectCategory> $categories The list of categories.
     */
    #[JsonProperty('categories'), ArrayType([CatalogObjectCategory::class])]
    private ?array $categories;

    /**
     * The item's description as expressed in valid HTML elements. The length of this field value, including those of HTML tags,
     * is of Unicode points. With application query filters, the text values of the HTML elements and attributes are searchable. Invalid or
     * unsupported HTML elements or attributes are ignored.
     *
     * Supported HTML elements include:
     * - `a`: Link. Supports linking to website URLs, email address, and telephone numbers.
     * - `b`, `strong`:  Bold text
     * - `br`: Line break
     * - `code`: Computer code
     * - `div`: Section
     * - `h1-h6`: Headings
     * - `i`, `em`: Italics
     * - `li`: List element
     * - `ol`: Numbered list
     * - `p`: Paragraph
     * - `ul`: Bullet list
     * - `u`: Underline
     *
     *
     * Supported HTML attributes include:
     * - `align`: Alignment of the text content
     * - `href`: Link destination
     * - `rel`: Relationship between link's target and source
     * - `target`: Place to open the linked document
     *
     * @var ?string $descriptionHtml
     */
    #[JsonProperty('description_html')]
    private ?string $descriptionHtml;

    /**
     * @var ?string $descriptionPlaintext A server-generated plaintext version of the `description_html` field, without formatting tags.
     */
    #[JsonProperty('description_plaintext')]
    private ?string $descriptionPlaintext;

    /**
     * A list of IDs representing channels, such as a Square Online site, where the item can be made visible or available.
     * This field is read only and cannot be edited.
     *
     * @var ?array<string> $channels
     */
    #[JsonProperty('channels'), ArrayType(['string'])]
    private ?array $channels;

    /**
     * @var ?bool $isArchived Indicates whether this item is archived (`true`) or not (`false`).
     */
    #[JsonProperty('is_archived')]
    private ?bool $isArchived;

    /**
     * @var ?CatalogEcomSeoData $ecomSeoData The SEO data for a seller's Square Online store.
     */
    #[JsonProperty('ecom_seo_data')]
    private ?CatalogEcomSeoData $ecomSeoData;

    /**
     * @var ?CatalogItemFoodAndBeverageDetails $foodAndBeverageDetails The food and beverage-specific details for the `FOOD_AND_BEV` item.
     */
    #[JsonProperty('food_and_beverage_details')]
    private ?CatalogItemFoodAndBeverageDetails $foodAndBeverageDetails;

    /**
     * @var ?CatalogObjectCategory $reportingCategory The item's reporting category.
     */
    #[JsonProperty('reporting_category')]
    private ?CatalogObjectCategory $reportingCategory;

    /**
     * @var ?bool $isAlcoholic Indicates whether this item is alcoholic (`true`) or not (`false`).
     */
    #[JsonProperty('is_alcoholic')]
    private ?bool $isAlcoholic;

    /**
     * @param array{
     *   name?: ?string,
     *   description?: ?string,
     *   abbreviation?: ?string,
     *   labelColor?: ?string,
     *   isTaxable?: ?bool,
     *   categoryId?: ?string,
     *   taxIds?: ?array<string>,
     *   modifierListInfo?: ?array<CatalogItemModifierListInfo>,
     *   variations?: ?array<CatalogObject>,
     *   productType?: ?value-of<CatalogItemProductType>,
     *   skipModifierScreen?: ?bool,
     *   itemOptions?: ?array<CatalogItemOptionForItem>,
     *   ecomUri?: ?string,
     *   ecomImageUris?: ?array<string>,
     *   imageIds?: ?array<string>,
     *   sortName?: ?string,
     *   categories?: ?array<CatalogObjectCategory>,
     *   descriptionHtml?: ?string,
     *   descriptionPlaintext?: ?string,
     *   channels?: ?array<string>,
     *   isArchived?: ?bool,
     *   ecomSeoData?: ?CatalogEcomSeoData,
     *   foodAndBeverageDetails?: ?CatalogItemFoodAndBeverageDetails,
     *   reportingCategory?: ?CatalogObjectCategory,
     *   isAlcoholic?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->abbreviation = $values['abbreviation'] ?? null;
        $this->labelColor = $values['labelColor'] ?? null;
        $this->isTaxable = $values['isTaxable'] ?? null;
        $this->categoryId = $values['categoryId'] ?? null;
        $this->taxIds = $values['taxIds'] ?? null;
        $this->modifierListInfo = $values['modifierListInfo'] ?? null;
        $this->variations = $values['variations'] ?? null;
        $this->productType = $values['productType'] ?? null;
        $this->skipModifierScreen = $values['skipModifierScreen'] ?? null;
        $this->itemOptions = $values['itemOptions'] ?? null;
        $this->ecomUri = $values['ecomUri'] ?? null;
        $this->ecomImageUris = $values['ecomImageUris'] ?? null;
        $this->imageIds = $values['imageIds'] ?? null;
        $this->sortName = $values['sortName'] ?? null;
        $this->categories = $values['categories'] ?? null;
        $this->descriptionHtml = $values['descriptionHtml'] ?? null;
        $this->descriptionPlaintext = $values['descriptionPlaintext'] ?? null;
        $this->channels = $values['channels'] ?? null;
        $this->isArchived = $values['isArchived'] ?? null;
        $this->ecomSeoData = $values['ecomSeoData'] ?? null;
        $this->foodAndBeverageDetails = $values['foodAndBeverageDetails'] ?? null;
        $this->reportingCategory = $values['reportingCategory'] ?? null;
        $this->isAlcoholic = $values['isAlcoholic'] ?? null;
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
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    /**
     * @param ?string $value
     */
    public function setAbbreviation(?string $value = null): self
    {
        $this->abbreviation = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLabelColor(): ?string
    {
        return $this->labelColor;
    }

    /**
     * @param ?string $value
     */
    public function setLabelColor(?string $value = null): self
    {
        $this->labelColor = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsTaxable(): ?bool
    {
        return $this->isTaxable;
    }

    /**
     * @param ?bool $value
     */
    public function setIsTaxable(?bool $value = null): self
    {
        $this->isTaxable = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCategoryId(): ?string
    {
        return $this->categoryId;
    }

    /**
     * @param ?string $value
     */
    public function setCategoryId(?string $value = null): self
    {
        $this->categoryId = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getTaxIds(): ?array
    {
        return $this->taxIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTaxIds(?array $value = null): self
    {
        $this->taxIds = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogItemModifierListInfo>
     */
    public function getModifierListInfo(): ?array
    {
        return $this->modifierListInfo;
    }

    /**
     * @param ?array<CatalogItemModifierListInfo> $value
     */
    public function setModifierListInfo(?array $value = null): self
    {
        $this->modifierListInfo = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getVariations(): ?array
    {
        return $this->variations;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setVariations(?array $value = null): self
    {
        $this->variations = $value;
        return $this;
    }

    /**
     * @return ?value-of<CatalogItemProductType>
     */
    public function getProductType(): ?string
    {
        return $this->productType;
    }

    /**
     * @param ?value-of<CatalogItemProductType> $value
     */
    public function setProductType(?string $value = null): self
    {
        $this->productType = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSkipModifierScreen(): ?bool
    {
        return $this->skipModifierScreen;
    }

    /**
     * @param ?bool $value
     */
    public function setSkipModifierScreen(?bool $value = null): self
    {
        $this->skipModifierScreen = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogItemOptionForItem>
     */
    public function getItemOptions(): ?array
    {
        return $this->itemOptions;
    }

    /**
     * @param ?array<CatalogItemOptionForItem> $value
     */
    public function setItemOptions(?array $value = null): self
    {
        $this->itemOptions = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEcomUri(): ?string
    {
        return $this->ecomUri;
    }

    /**
     * @param ?string $value
     */
    public function setEcomUri(?string $value = null): self
    {
        $this->ecomUri = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getEcomImageUris(): ?array
    {
        return $this->ecomImageUris;
    }

    /**
     * @param ?array<string> $value
     */
    public function setEcomImageUris(?array $value = null): self
    {
        $this->ecomImageUris = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getImageIds(): ?array
    {
        return $this->imageIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setImageIds(?array $value = null): self
    {
        $this->imageIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSortName(): ?string
    {
        return $this->sortName;
    }

    /**
     * @param ?string $value
     */
    public function setSortName(?string $value = null): self
    {
        $this->sortName = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogObjectCategory>
     */
    public function getCategories(): ?array
    {
        return $this->categories;
    }

    /**
     * @param ?array<CatalogObjectCategory> $value
     */
    public function setCategories(?array $value = null): self
    {
        $this->categories = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescriptionHtml(): ?string
    {
        return $this->descriptionHtml;
    }

    /**
     * @param ?string $value
     */
    public function setDescriptionHtml(?string $value = null): self
    {
        $this->descriptionHtml = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescriptionPlaintext(): ?string
    {
        return $this->descriptionPlaintext;
    }

    /**
     * @param ?string $value
     */
    public function setDescriptionPlaintext(?string $value = null): self
    {
        $this->descriptionPlaintext = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }

    /**
     * @param ?array<string> $value
     */
    public function setChannels(?array $value = null): self
    {
        $this->channels = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    /**
     * @param ?bool $value
     */
    public function setIsArchived(?bool $value = null): self
    {
        $this->isArchived = $value;
        return $this;
    }

    /**
     * @return ?CatalogEcomSeoData
     */
    public function getEcomSeoData(): ?CatalogEcomSeoData
    {
        return $this->ecomSeoData;
    }

    /**
     * @param ?CatalogEcomSeoData $value
     */
    public function setEcomSeoData(?CatalogEcomSeoData $value = null): self
    {
        $this->ecomSeoData = $value;
        return $this;
    }

    /**
     * @return ?CatalogItemFoodAndBeverageDetails
     */
    public function getFoodAndBeverageDetails(): ?CatalogItemFoodAndBeverageDetails
    {
        return $this->foodAndBeverageDetails;
    }

    /**
     * @param ?CatalogItemFoodAndBeverageDetails $value
     */
    public function setFoodAndBeverageDetails(?CatalogItemFoodAndBeverageDetails $value = null): self
    {
        $this->foodAndBeverageDetails = $value;
        return $this;
    }

    /**
     * @return ?CatalogObjectCategory
     */
    public function getReportingCategory(): ?CatalogObjectCategory
    {
        return $this->reportingCategory;
    }

    /**
     * @param ?CatalogObjectCategory $value
     */
    public function setReportingCategory(?CatalogObjectCategory $value = null): self
    {
        $this->reportingCategory = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsAlcoholic(): ?bool
    {
        return $this->isAlcoholic;
    }

    /**
     * @param ?bool $value
     */
    public function setIsAlcoholic(?bool $value = null): self
    {
        $this->isAlcoholic = $value;
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
