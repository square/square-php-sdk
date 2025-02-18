<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * SEO data for for a seller's Square Online store.
 */
class CatalogEcomSeoData extends JsonSerializableType
{
    /**
     * @var ?string $pageTitle The SEO title used for the Square Online store.
     */
    #[JsonProperty('page_title')]
    private ?string $pageTitle;

    /**
     * @var ?string $pageDescription The SEO description used for the Square Online store.
     */
    #[JsonProperty('page_description')]
    private ?string $pageDescription;

    /**
     * @var ?string $permalink The SEO permalink used for the Square Online store.
     */
    #[JsonProperty('permalink')]
    private ?string $permalink;

    /**
     * @param array{
     *   pageTitle?: ?string,
     *   pageDescription?: ?string,
     *   permalink?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pageTitle = $values['pageTitle'] ?? null;
        $this->pageDescription = $values['pageDescription'] ?? null;
        $this->permalink = $values['permalink'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getPageTitle(): ?string
    {
        return $this->pageTitle;
    }

    /**
     * @param ?string $value
     */
    public function setPageTitle(?string $value = null): self
    {
        $this->pageTitle = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPageDescription(): ?string
    {
        return $this->pageDescription;
    }

    /**
     * @param ?string $value
     */
    public function setPageDescription(?string $value = null): self
    {
        $this->pageDescription = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPermalink(): ?string
    {
        return $this->permalink;
    }

    /**
     * @param ?string $value
     */
    public function setPermalink(?string $value = null): self
    {
        $this->permalink = $value;
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
