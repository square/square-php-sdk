<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogEcomSeoData;

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
     * Initializes a new Catalog Ecom Seo Data Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogEcomSeoData());
    }

    /**
     * Sets page title field.
     *
     * @param string|null $value
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
     *
     * @param string|null $value
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
     *
     * @param string|null $value
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
     * Initializes a new Catalog Ecom Seo Data object.
     */
    public function build(): CatalogEcomSeoData
    {
        return CoreHelper::clone($this->instance);
    }
}
