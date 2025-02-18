<?php

namespace Square\Snippets\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Snippet;
use Square\Core\Json\JsonProperty;

class UpsertSnippetRequest extends JsonSerializableType
{
    /**
     * @var string $siteId The ID of the site where you want to add or update the snippet.
     */
    private string $siteId;

    /**
     * @var Snippet $snippet The snippet for the site.
     */
    #[JsonProperty('snippet')]
    private Snippet $snippet;

    /**
     * @param array{
     *   siteId: string,
     *   snippet: Snippet,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->siteId = $values['siteId'];
        $this->snippet = $values['snippet'];
    }

    /**
     * @return string
     */
    public function getSiteId(): string
    {
        return $this->siteId;
    }

    /**
     * @param string $value
     */
    public function setSiteId(string $value): self
    {
        $this->siteId = $value;
        return $this;
    }

    /**
     * @return Snippet
     */
    public function getSnippet(): Snippet
    {
        return $this->snippet;
    }

    /**
     * @param Snippet $value
     */
    public function setSnippet(Snippet $value): self
    {
        $this->snippet = $value;
        return $this;
    }
}
