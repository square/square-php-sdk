<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogCustomAttributeDefinitionNumberConfig;

/**
 * Builder for model CatalogCustomAttributeDefinitionNumberConfig
 *
 * @see CatalogCustomAttributeDefinitionNumberConfig
 */
class CatalogCustomAttributeDefinitionNumberConfigBuilder
{
    /**
     * @var CatalogCustomAttributeDefinitionNumberConfig
     */
    private $instance;

    private function __construct(CatalogCustomAttributeDefinitionNumberConfig $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Custom Attribute Definition Number Config Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogCustomAttributeDefinitionNumberConfig());
    }

    /**
     * Sets precision field.
     *
     * @param int|null $value
     */
    public function precision(?int $value): self
    {
        $this->instance->setPrecision($value);
        return $this;
    }

    /**
     * Unsets precision field.
     */
    public function unsetPrecision(): self
    {
        $this->instance->unsetPrecision();
        return $this;
    }

    /**
     * Initializes a new Catalog Custom Attribute Definition Number Config object.
     */
    public function build(): CatalogCustomAttributeDefinitionNumberConfig
    {
        return CoreHelper::clone($this->instance);
    }
}
