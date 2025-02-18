<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\UpdateCatalogImageRequest;

/**
 * Builder for model UpdateCatalogImageRequest
 *
 * @see UpdateCatalogImageRequest
 */
class UpdateCatalogImageRequestBuilder
{
    /**
     * @var UpdateCatalogImageRequest
     */
    private $instance;

    private function __construct(UpdateCatalogImageRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Catalog Image Request Builder object.
     *
     * @param string $idempotencyKey
     */
    public static function init(string $idempotencyKey): self
    {
        return new self(new UpdateCatalogImageRequest($idempotencyKey));
    }

    /**
     * Initializes a new Update Catalog Image Request object.
     */
    public function build(): UpdateCatalogImageRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
