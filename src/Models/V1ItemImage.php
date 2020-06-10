<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1ItemImage
 */
class V1ItemImage implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $url;

    /**
     * Returns Id.
     *
     * The image's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The image's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Url.
     *
     * The image's publicly accessible URL.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Sets Url.
     *
     * The image's publicly accessible URL.
     *
     * @maps url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']  = $this->id;
        $json['url'] = $this->url;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
