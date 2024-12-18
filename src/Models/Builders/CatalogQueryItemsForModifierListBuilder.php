<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogQueryItemsForModifierList;

/**
 * Builder for model CatalogQueryItemsForModifierList
 *
 * @see CatalogQueryItemsForModifierList
 */
class CatalogQueryItemsForModifierListBuilder
{
    /**
     * @var CatalogQueryItemsForModifierList
     */
    private $instance;

    private function __construct(CatalogQueryItemsForModifierList $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Query Items For Modifier List Builder object.
     *
     * @param string[] $modifierListIds
     */
    public static function init(array $modifierListIds): self
    {
        return new self(new CatalogQueryItemsForModifierList($modifierListIds));
    }

    /**
     * Initializes a new Catalog Query Items For Modifier List object.
     */
    public function build(): CatalogQueryItemsForModifierList
    {
        return CoreHelper::clone($this->instance);
    }
}
