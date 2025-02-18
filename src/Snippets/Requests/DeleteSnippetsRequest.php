<?php

namespace Square\Snippets\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteSnippetsRequest extends JsonSerializableType
{
    /**
     * @var string $siteId The ID of the site that contains the snippet.
     */
    private string $siteId;

    /**
     * @param array{
     *   siteId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->siteId = $values['siteId'];
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
}
