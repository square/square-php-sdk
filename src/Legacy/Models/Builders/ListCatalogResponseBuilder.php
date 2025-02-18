<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogObject;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListCatalogResponse;

/**
 * Builder for model ListCatalogResponse
 *
 * @see ListCatalogResponse
 */
class ListCatalogResponseBuilder
{
    /**
     * @var ListCatalogResponse
     */
    private $instance;

    private function __construct(ListCatalogResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Catalog Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListCatalogResponse());
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
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Sets objects field.
     *
     * @param CatalogObject[]|null $value
     */
    public function objects(?array $value): self
    {
        $this->instance->setObjects($value);
        return $this;
    }

    /**
     * Initializes a new List Catalog Response object.
     */
    public function build(): ListCatalogResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
