<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A category to which a `CatalogItem` instance belongs.
 */
class CatalogCategory extends JsonSerializableType
{
    /**
     * @var ?string $name The category name. This is a searchable attribute for use in applicable query filters, and its value length is of Unicode code points.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * The IDs of images associated with this `CatalogCategory` instance.
     * Currently these images are not displayed by Square, but are free to be displayed in 3rd party applications.
     *
     * @var ?array<string> $imageIds
     */
    #[JsonProperty('image_ids'), ArrayType(['string'])]
    private ?array $imageIds;

    /**
     * The type of the category.
     * See [CatalogCategoryType](#type-catalogcategorytype) for possible values
     *
     * @var ?value-of<CatalogCategoryType> $categoryType
     */
    #[JsonProperty('category_type')]
    private ?string $categoryType;

    /**
     * @var ?CatalogObjectCategory $parentCategory The ID of the parent category of this category instance.
     */
    #[JsonProperty('parent_category')]
    private ?CatalogObjectCategory $parentCategory;

    /**
     * @var ?bool $isTopLevel Indicates whether a category is a top level category, which does not have any parent_category.
     */
    #[JsonProperty('is_top_level')]
    private ?bool $isTopLevel;

    /**
     * @var ?array<string> $channels A list of IDs representing channels, such as a Square Online site, where the category can be made visible.
     */
    #[JsonProperty('channels'), ArrayType(['string'])]
    private ?array $channels;

    /**
     * @var ?array<string> $availabilityPeriodIds The IDs of the `CatalogAvailabilityPeriod` objects associated with the category.
     */
    #[JsonProperty('availability_period_ids'), ArrayType(['string'])]
    private ?array $availabilityPeriodIds;

    /**
     * @var ?bool $onlineVisibility Indicates whether the category is visible (`true`) or hidden (`false`) on all of the seller's Square Online sites.
     */
    #[JsonProperty('online_visibility')]
    private ?bool $onlineVisibility;

    /**
     * @var ?string $rootCategory The top-level category in a category hierarchy.
     */
    #[JsonProperty('root_category')]
    private ?string $rootCategory;

    /**
     * @var ?CatalogEcomSeoData $ecomSeoData The SEO data for a seller's Square Online store.
     */
    #[JsonProperty('ecom_seo_data')]
    private ?CatalogEcomSeoData $ecomSeoData;

    /**
     * The path from the category to its root category. The first node of the path is the parent of the category
     * and the last is the root category. The path is empty if the category is a root category.
     *
     * @var ?array<CategoryPathToRootNode> $pathToRoot
     */
    #[JsonProperty('path_to_root'), ArrayType([CategoryPathToRootNode::class])]
    private ?array $pathToRoot;

    /**
     * @param array{
     *   name?: ?string,
     *   imageIds?: ?array<string>,
     *   categoryType?: ?value-of<CatalogCategoryType>,
     *   parentCategory?: ?CatalogObjectCategory,
     *   isTopLevel?: ?bool,
     *   channels?: ?array<string>,
     *   availabilityPeriodIds?: ?array<string>,
     *   onlineVisibility?: ?bool,
     *   rootCategory?: ?string,
     *   ecomSeoData?: ?CatalogEcomSeoData,
     *   pathToRoot?: ?array<CategoryPathToRootNode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->imageIds = $values['imageIds'] ?? null;
        $this->categoryType = $values['categoryType'] ?? null;
        $this->parentCategory = $values['parentCategory'] ?? null;
        $this->isTopLevel = $values['isTopLevel'] ?? null;
        $this->channels = $values['channels'] ?? null;
        $this->availabilityPeriodIds = $values['availabilityPeriodIds'] ?? null;
        $this->onlineVisibility = $values['onlineVisibility'] ?? null;
        $this->rootCategory = $values['rootCategory'] ?? null;
        $this->ecomSeoData = $values['ecomSeoData'] ?? null;
        $this->pathToRoot = $values['pathToRoot'] ?? null;
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
     * @return ?value-of<CatalogCategoryType>
     */
    public function getCategoryType(): ?string
    {
        return $this->categoryType;
    }

    /**
     * @param ?value-of<CatalogCategoryType> $value
     */
    public function setCategoryType(?string $value = null): self
    {
        $this->categoryType = $value;
        return $this;
    }

    /**
     * @return ?CatalogObjectCategory
     */
    public function getParentCategory(): ?CatalogObjectCategory
    {
        return $this->parentCategory;
    }

    /**
     * @param ?CatalogObjectCategory $value
     */
    public function setParentCategory(?CatalogObjectCategory $value = null): self
    {
        $this->parentCategory = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsTopLevel(): ?bool
    {
        return $this->isTopLevel;
    }

    /**
     * @param ?bool $value
     */
    public function setIsTopLevel(?bool $value = null): self
    {
        $this->isTopLevel = $value;
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
     * @return ?array<string>
     */
    public function getAvailabilityPeriodIds(): ?array
    {
        return $this->availabilityPeriodIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setAvailabilityPeriodIds(?array $value = null): self
    {
        $this->availabilityPeriodIds = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getOnlineVisibility(): ?bool
    {
        return $this->onlineVisibility;
    }

    /**
     * @param ?bool $value
     */
    public function setOnlineVisibility(?bool $value = null): self
    {
        $this->onlineVisibility = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRootCategory(): ?string
    {
        return $this->rootCategory;
    }

    /**
     * @param ?string $value
     */
    public function setRootCategory(?string $value = null): self
    {
        $this->rootCategory = $value;
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
     * @return ?array<CategoryPathToRootNode>
     */
    public function getPathToRoot(): ?array
    {
        return $this->pathToRoot;
    }

    /**
     * @param ?array<CategoryPathToRootNode> $value
     */
    public function setPathToRoot(?array $value = null): self
    {
        $this->pathToRoot = $value;
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
