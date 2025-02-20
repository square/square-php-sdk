<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogObject;
use Square\Legacy\Models\CatalogObjectBatch;

/**
 * Builder for model CatalogObjectBatch
 *
 * @see CatalogObjectBatch
 */
class CatalogObjectBatchBuilder
{
    /**
     * @var CatalogObjectBatch
     */
    private $instance;

    private function __construct(CatalogObjectBatch $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Catalog Object Batch Builder object.
     *
     * @param CatalogObject[] $objects
     */
    public static function init(array $objects): self
    {
        return new self(new CatalogObjectBatch($objects));
    }

    /**
     * Initializes a new Catalog Object Batch object.
     */
    public function build(): CatalogObjectBatch
    {
        return CoreHelper::clone($this->instance);
    }
}
