<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a Square Online site, which is an online store for a Square seller.
 */
class Site implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $siteTitle;

    /**
     * @var string|null
     */
    private $domain;

    /**
     * @var bool|null
     */
    private $isPublished;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the site.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the site.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Site Title.
     *
     * The title of the site.
     */
    public function getSiteTitle(): ?string
    {
        return $this->siteTitle;
    }

    /**
     * Sets Site Title.
     *
     * The title of the site.
     *
     * @maps site_title
     */
    public function setSiteTitle(?string $siteTitle): void
    {
        $this->siteTitle = $siteTitle;
    }

    /**
     * Returns Domain.
     *
     * The domain of the site (without the protocol). For example, `mysite1.square.site`.
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * Sets Domain.
     *
     * The domain of the site (without the protocol). For example, `mysite1.square.site`.
     *
     * @maps domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * Returns Is Published.
     *
     * Indicates whether the site is published.
     */
    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    /**
     * Sets Is Published.
     *
     * Indicates whether the site is published.
     *
     * @maps is_published
     */
    public function setIsPublished(?bool $isPublished): void
    {
        $this->isPublished = $isPublished;
    }

    /**
     * Returns Created At.
     *
     * The timestamp of when the site was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp of when the site was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp of when the site was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp of when the site was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']           = $this->id;
        }
        if (isset($this->siteTitle)) {
            $json['site_title']   = $this->siteTitle;
        }
        if (isset($this->domain)) {
            $json['domain']       = $this->domain;
        }
        if (isset($this->isPublished)) {
            $json['is_published'] = $this->isPublished;
        }
        if (isset($this->createdAt)) {
            $json['created_at']   = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']   = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
