<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogObject;
use Square\Legacy\Models\CreateCatalogImageResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model CreateCatalogImageResponse
 *
 * @see CreateCatalogImageResponse
 */
class CreateCatalogImageResponseBuilder
{
    /**
     * @var CreateCatalogImageResponse
     */
    private $instance;

    private function __construct(CreateCatalogImageResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Catalog Image Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateCatalogImageResponse());
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
     * Sets image field.
     *
     * @param CatalogObject|null $value
     */
    public function image(?CatalogObject $value): self
    {
        $this->instance->setImage($value);
        return $this;
    }

    /**
     * Initializes a new Create Catalog Image Response object.
     */
    public function build(): CreateCatalogImageResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
