<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeleteSnippetResponse;
use Square\Models\Error;

/**
 * Builder for model DeleteSnippetResponse
 *
 * @see DeleteSnippetResponse
 */
class DeleteSnippetResponseBuilder
{
    /**
     * @var DeleteSnippetResponse
     */
    private $instance;

    private function __construct(DeleteSnippetResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Snippet Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteSnippetResponse());
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
     * Initializes a new Delete Snippet Response object.
     */
    public function build(): DeleteSnippetResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
