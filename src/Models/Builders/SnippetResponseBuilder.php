<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\Snippet;
use Square\Models\SnippetResponse;

/**
 * Builder for model SnippetResponse
 *
 * @see SnippetResponse
 */
class SnippetResponseBuilder
{
    /**
     * @var SnippetResponse
     */
    private $instance;

    private function __construct(SnippetResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Snippet Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SnippetResponse());
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
     * Sets snippet field.
     *
     * @param Snippet|null $value
     */
    public function snippet(?Snippet $value): self
    {
        $this->instance->setSnippet($value);
        return $this;
    }

    /**
     * Initializes a new Snippet Response object.
     */
    public function build(): SnippetResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
