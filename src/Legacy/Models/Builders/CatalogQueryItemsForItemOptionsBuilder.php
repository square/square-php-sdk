<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogQueryItemsForItemOptions;

/**
 * Builder for model CatalogQueryItemsForItemOptions
 *
 * @see CatalogQueryItemsForItemOptions
 */
class CatalogQueryItemsForItemOptionsBuilder
{
    /**
     * @var CatalogQueryItemsForItemOptions
     */
    private $instance;

    private function __construct(CatalogQueryItemsForItemOptions $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Query Items For Item Options Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogQueryItemsForItemOptions());
    }

    /**
     * Sets item option ids field.
     *
     * @param string[]|null $value
     */
    public function itemOptionIds(?array $value): self
    {
        $this->instance->setItemOptionIds($value);
        return $this;
    }

    /**
     * Unsets item option ids field.
     */
    public function unsetItemOptionIds(): self
    {
        $this->instance->unsetItemOptionIds();
        return $this;
    }

    /**
     * Initializes a new Catalog Query Items For Item Options object.
     */
    public function build(): CatalogQueryItemsForItemOptions
    {
        return CoreHelper::clone($this->instance);
    }
}
