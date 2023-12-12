<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogObjectCategory;

/**
 * Builder for model CatalogObjectCategory
 *
 * @see CatalogObjectCategory
 */
class CatalogObjectCategoryBuilder
{
    /**
     * @var CatalogObjectCategory
     */
    private $instance;

    private function __construct(CatalogObjectCategory $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new catalog object category Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogObjectCategory());
    }

    /**
     * Sets id field.
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets ordinal field.
     */
    public function ordinal(?int $value): self
    {
        $this->instance->setOrdinal($value);
        return $this;
    }

    /**
     * Unsets ordinal field.
     */
    public function unsetOrdinal(): self
    {
        $this->instance->unsetOrdinal();
        return $this;
    }

    /**
     * Initializes a new catalog object category object.
     */
    public function build(): CatalogObjectCategory
    {
        return CoreHelper::clone($this->instance);
    }
}
