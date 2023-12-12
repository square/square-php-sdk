<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogCategory;
use Square\Models\CatalogEcomSeoData;
use Square\Models\CatalogObjectCategory;

/**
 * Builder for model CatalogCategory
 *
 * @see CatalogCategory
 */
class CatalogCategoryBuilder
{
    /**
     * @var CatalogCategory
     */
    private $instance;

    private function __construct(CatalogCategory $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new catalog category Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogCategory());
    }

    /**
     * Sets name field.
     */
    public function name(?string $value): self
    {
        $this->instance->setName($value);
        return $this;
    }

    /**
     * Unsets name field.
     */
    public function unsetName(): self
    {
        $this->instance->unsetName();
        return $this;
    }

    /**
     * Sets image ids field.
     */
    public function imageIds(?array $value): self
    {
        $this->instance->setImageIds($value);
        return $this;
    }

    /**
     * Unsets image ids field.
     */
    public function unsetImageIds(): self
    {
        $this->instance->unsetImageIds();
        return $this;
    }

    /**
     * Sets category type field.
     */
    public function categoryType(?string $value): self
    {
        $this->instance->setCategoryType($value);
        return $this;
    }

    /**
     * Sets parent category field.
     */
    public function parentCategory(?CatalogObjectCategory $value): self
    {
        $this->instance->setParentCategory($value);
        return $this;
    }

    /**
     * Sets is top level field.
     */
    public function isTopLevel(?bool $value): self
    {
        $this->instance->setIsTopLevel($value);
        return $this;
    }

    /**
     * Unsets is top level field.
     */
    public function unsetIsTopLevel(): self
    {
        $this->instance->unsetIsTopLevel();
        return $this;
    }

    /**
     * Sets channels field.
     */
    public function channels(?array $value): self
    {
        $this->instance->setChannels($value);
        return $this;
    }

    /**
     * Unsets channels field.
     */
    public function unsetChannels(): self
    {
        $this->instance->unsetChannels();
        return $this;
    }

    /**
     * Sets availability period ids field.
     */
    public function availabilityPeriodIds(?array $value): self
    {
        $this->instance->setAvailabilityPeriodIds($value);
        return $this;
    }

    /**
     * Unsets availability period ids field.
     */
    public function unsetAvailabilityPeriodIds(): self
    {
        $this->instance->unsetAvailabilityPeriodIds();
        return $this;
    }

    /**
     * Sets online visibility field.
     */
    public function onlineVisibility(?bool $value): self
    {
        $this->instance->setOnlineVisibility($value);
        return $this;
    }

    /**
     * Unsets online visibility field.
     */
    public function unsetOnlineVisibility(): self
    {
        $this->instance->unsetOnlineVisibility();
        return $this;
    }

    /**
     * Sets root category field.
     */
    public function rootCategory(?string $value): self
    {
        $this->instance->setRootCategory($value);
        return $this;
    }

    /**
     * Sets ecom seo data field.
     */
    public function ecomSeoData(?CatalogEcomSeoData $value): self
    {
        $this->instance->setEcomSeoData($value);
        return $this;
    }

    /**
     * Sets path to root field.
     */
    public function pathToRoot(?array $value): self
    {
        $this->instance->setPathToRoot($value);
        return $this;
    }

    /**
     * Unsets path to root field.
     */
    public function unsetPathToRoot(): self
    {
        $this->instance->unsetPathToRoot();
        return $this;
    }

    /**
     * Initializes a new catalog category object.
     */
    public function build(): CatalogCategory
    {
        return CoreHelper::clone($this->instance);
    }
}
