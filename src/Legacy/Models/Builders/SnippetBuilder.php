<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Snippet;

/**
 * Builder for model Snippet
 *
 * @see Snippet
 */
class SnippetBuilder
{
    /**
     * @var Snippet
     */
    private $instance;

    private function __construct(Snippet $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Snippet Builder object.
     *
     * @param string $content
     */
    public static function init(string $content): self
    {
        return new self(new Snippet($content));
    }

    /**
     * Sets id field.
     *
     * @param string|null $value
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets site id field.
     *
     * @param string|null $value
     */
    public function siteId(?string $value): self
    {
        $this->instance->setSiteId($value);
        return $this;
    }

    /**
     * Sets created at field.
     *
     * @param string|null $value
     */
    public function createdAt(?string $value): self
    {
        $this->instance->setCreatedAt($value);
        return $this;
    }

    /**
     * Sets updated at field.
     *
     * @param string|null $value
     */
    public function updatedAt(?string $value): self
    {
        $this->instance->setUpdatedAt($value);
        return $this;
    }

    /**
     * Initializes a new Snippet object.
     */
    public function build(): Snippet
    {
        return CoreHelper::clone($this->instance);
    }
}
