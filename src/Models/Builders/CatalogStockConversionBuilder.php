<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogStockConversion;

/**
 * Builder for model CatalogStockConversion
 *
 * @see CatalogStockConversion
 */
class CatalogStockConversionBuilder
{
    /**
     * @var CatalogStockConversion
     */
    private $instance;

    private function __construct(CatalogStockConversion $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Stock Conversion Builder object.
     *
     * @param string $stockableItemVariationId
     * @param string $stockableQuantity
     * @param string $nonstockableQuantity
     */
    public static function init(
        string $stockableItemVariationId,
        string $stockableQuantity,
        string $nonstockableQuantity
    ): self {
        return new self(
            new CatalogStockConversion($stockableItemVariationId, $stockableQuantity, $nonstockableQuantity)
        );
    }

    /**
     * Initializes a new Catalog Stock Conversion object.
     */
    public function build(): CatalogStockConversion
    {
        return CoreHelper::clone($this->instance);
    }
}
