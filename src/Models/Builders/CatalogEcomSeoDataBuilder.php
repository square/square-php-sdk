<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogEcomSeoData;

/**
 * Builder for model CatalogEcomSeoData
 *
 * @see CatalogEcomSeoData
 */
class CatalogEcomSeoDataBuilder
{
    /**
     * @var CatalogEcomSeoData
     */
    private $instance;

    private function __construct(CatalogEcomSeoData $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new catalog ecom seo data Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogEcomSeoData());
    }

    /**
     * Sets page title field.
     */
    public function pageTitle(?string $value): self
    {
        $this->instance->setPageTitle($value);
        return $this;
    }

    /**
     * Unsets page title field.
     */
    public function unsetPageTitle(): self
    {
        $this->instance->unsetPageTitle();
        return $this;
    }

    /**
     * Sets page description field.
     */
    public function pageDescription(?string $value): self
    {
        $this->instance->setPageDescription($value);
        return $this;
    }

    /**
     * Unsets page description field.
     */
    public function unsetPageDescription(): self
    {
        $this->instance->unsetPageDescription();
        return $this;
    }

    /**
     * Sets permalink field.
     */
    public function permalink(?string $value): self
    {
        $this->instance->setPermalink($value);
        return $this;
    }

    /**
     * Unsets permalink field.
     */
    public function unsetPermalink(): self
    {
        $this->instance->unsetPermalink();
        return $this;
    }

    /**
     * Initializes a new catalog ecom seo data object.
     */
    public function build(): CatalogEcomSeoData
    {
        return CoreHelper::clone($this->instance);
    }
}
