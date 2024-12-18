<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Snippet;
use Square\Models\UpsertSnippetRequest;

/**
 * Builder for model UpsertSnippetRequest
 *
 * @see UpsertSnippetRequest
 */
class UpsertSnippetRequestBuilder
{
    /**
     * @var UpsertSnippetRequest
     */
    private $instance;

    private function __construct(UpsertSnippetRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Upsert Snippet Request Builder object.
     *
     * @param Snippet $snippet
     */
    public static function init(Snippet $snippet): self
    {
        return new self(new UpsertSnippetRequest($snippet));
    }

    /**
     * Initializes a new Upsert Snippet Request object.
     */
    public function build(): UpsertSnippetRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
