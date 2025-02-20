<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the snippet that is added to a Square Online site. The snippet code is injected into the `head` element of all pages on the site, except for checkout pages.
 */
class Snippet extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID for the snippet.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $siteId The ID of the site that contains the snippet.
     */
    #[JsonProperty('site_id')]
    private ?string $siteId;

    /**
     * @var string $content The snippet code, which can contain valid HTML, JavaScript, or both.
     */
    #[JsonProperty('content')]
    private string $content;

    /**
     * @var ?string $createdAt The timestamp of when the snippet was initially added to the site, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp of when the snippet was last updated on the site, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   content: string,
     *   id?: ?string,
     *   siteId?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->siteId = $values['siteId'] ?? null;
        $this->content = $values['content'];
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSiteId(): ?string
    {
        return $this->siteId;
    }

    /**
     * @param ?string $value
     */
    public function setSiteId(?string $value = null): self
    {
        $this->siteId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $value
     */
    public function setContent(string $value): self
    {
        $this->content = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
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
