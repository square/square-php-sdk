<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogQueryPrefix;

/**
 * Builder for model CatalogQueryPrefix
 *
 * @see CatalogQueryPrefix
 */
class CatalogQueryPrefixBuilder
{
    /**
     * @var CatalogQueryPrefix
     */
    private $instance;

    private function __construct(CatalogQueryPrefix $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Query Prefix Builder object.
     *
     * @param string $attributeName
     * @param string $attributePrefix
     */
    public static function init(string $attributeName, string $attributePrefix): self
    {
        return new self(new CatalogQueryPrefix($attributeName, $attributePrefix));
    }

    /**
     * Initializes a new Catalog Query Prefix object.
     */
    public function build(): CatalogQueryPrefix
    {
        return CoreHelper::clone($this->instance);
    }
}
