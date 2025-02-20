<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a Square Online site, which is an online store for a Square seller.
 */
class Site extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the site.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $siteTitle The title of the site.
     */
    #[JsonProperty('site_title')]
    private ?string $siteTitle;

    /**
     * @var ?string $domain The domain of the site (without the protocol). For example, `mysite1.square.site`.
     */
    #[JsonProperty('domain')]
    private ?string $domain;

    /**
     * @var ?bool $isPublished Indicates whether the site is published.
     */
    #[JsonProperty('is_published')]
    private ?bool $isPublished;

    /**
     * @var ?string $createdAt The timestamp of when the site was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp of when the site was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   siteTitle?: ?string,
     *   domain?: ?string,
     *   isPublished?: ?bool,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->siteTitle = $values['siteTitle'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->isPublished = $values['isPublished'] ?? null;
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
    public function getSiteTitle(): ?string
    {
        return $this->siteTitle;
    }

    /**
     * @param ?string $value
     */
    public function setSiteTitle(?string $value = null): self
    {
        $this->siteTitle = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param ?string $value
     */
    public function setDomain(?string $value = null): self
    {
        $this->domain = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    /**
     * @param ?bool $value
     */
    public function setIsPublished(?bool $value = null): self
    {
        $this->isPublished = $value;
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
