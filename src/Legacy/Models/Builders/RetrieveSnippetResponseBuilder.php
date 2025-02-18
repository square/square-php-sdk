<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveSnippetResponse;
use Square\Legacy\Models\Snippet;

/**
 * Builder for model RetrieveSnippetResponse
 *
 * @see RetrieveSnippetResponse
 */
class RetrieveSnippetResponseBuilder
{
    /**
     * @var RetrieveSnippetResponse
     */
    private $instance;

    private function __construct(RetrieveSnippetResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Snippet Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveSnippetResponse());
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
     * Initializes a new Retrieve Snippet Response object.
     */
    public function build(): RetrieveSnippetResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
