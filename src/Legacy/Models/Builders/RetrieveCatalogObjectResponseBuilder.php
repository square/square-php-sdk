<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogObject;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveCatalogObjectResponse;

/**
 * Builder for model RetrieveCatalogObjectResponse
 *
 * @see RetrieveCatalogObjectResponse
 */
class RetrieveCatalogObjectResponseBuilder
{
    /**
     * @var RetrieveCatalogObjectResponse
     */
    private $instance;

    private function __construct(RetrieveCatalogObjectResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Catalog Object Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveCatalogObjectResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets object field.
     *
     * @param CatalogObject|null $value
     */
    public function object(?CatalogObject $value): self
    {
        $this->instance->setObject($value);
        return $this;
    }

    /**
     * Sets related objects field.
     *
     * @param CatalogObject[]|null $value
     */
    public function relatedObjects(?array $value): self
    {
        $this->instance->setRelatedObjects($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Catalog Object Response object.
     */
    public function build(): RetrieveCatalogObjectResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
