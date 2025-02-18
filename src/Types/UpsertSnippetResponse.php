<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an `UpsertSnippet` response. The response can include either `snippet` or `errors`.
 */
class UpsertSnippetResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Snippet $snippet The new or updated snippet.
     */
    #[JsonProperty('snippet')]
    private ?Snippet $snippet;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   snippet?: ?Snippet,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->snippet = $values['snippet'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?Snippet
     */
    public function getSnippet(): ?Snippet
    {
        return $this->snippet;
    }

    /**
     * @param ?Snippet $value
     */
    public function setSnippet(?Snippet $value = null): self
    {
        $this->snippet = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
