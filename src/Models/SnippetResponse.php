<?php

declare(strict_types=1);

namespace Square\Models;

class SnippetResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Snippet|null
     */
    private $snippet;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Snippet.
     *
     * Represents the snippet that is added to a Square Online site. The snippet code is injected into the
     * `head` element of all pages on the site, except for checkout pages.
     */
    public function getSnippet(): ?Snippet
    {
        return $this->snippet;
    }

    /**
     * Sets Snippet.
     *
     * Represents the snippet that is added to a Square Online site. The snippet code is injected into the
     * `head` element of all pages on the site, except for checkout pages.
     *
     * @maps snippet
     */
    public function setSnippet(?Snippet $snippet): void
    {
        $this->snippet = $snippet;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']  = $this->errors;
        }
        if (isset($this->snippet)) {
            $json['snippet'] = $this->snippet;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
