<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogCustomAttributeDefinitionSelectionConfig;
use Square\Legacy\Models\CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection;

/**
 * Builder for model CatalogCustomAttributeDefinitionSelectionConfig
 *
 * @see CatalogCustomAttributeDefinitionSelectionConfig
 */
class CatalogCustomAttributeDefinitionSelectionConfigBuilder
{
    /**
     * @var CatalogCustomAttributeDefinitionSelectionConfig
     */
    private $instance;

    private function __construct(CatalogCustomAttributeDefinitionSelectionConfig $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Custom Attribute Definition Selection Config Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogCustomAttributeDefinitionSelectionConfig());
    }

    /**
     * Sets max allowed selections field.
     *
     * @param int|null $value
     */
    public function maxAllowedSelections(?int $value): self
    {
        $this->instance->setMaxAllowedSelections($value);
        return $this;
    }

    /**
     * Unsets max allowed selections field.
     */
    public function unsetMaxAllowedSelections(): self
    {
        $this->instance->unsetMaxAllowedSelections();
        return $this;
    }

    /**
     * Sets allowed selections field.
     *
     * @param CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection[]|null $value
     */
    public function allowedSelections(?array $value): self
    {
        $this->instance->setAllowedSelections($value);
        return $this;
    }

    /**
     * Unsets allowed selections field.
     */
    public function unsetAllowedSelections(): self
    {
        $this->instance->unsetAllowedSelections();
        return $this;
    }

    /**
     * Initializes a new Catalog Custom Attribute Definition Selection Config object.
     */
    public function build(): CatalogCustomAttributeDefinitionSelectionConfig
    {
        return CoreHelper::clone($this->instance);
    }
}
