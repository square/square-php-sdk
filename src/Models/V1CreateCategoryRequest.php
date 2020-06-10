<?php

declare(strict_types=1);

namespace Square\Models;

class V1CreateCategoryRequest implements \JsonSerializable
{
    /**
     * @var V1Category|null
     */
    private $body;

    /**
     * Returns Body.
     *
     * V1Category
     */
    public function getBody(): ?V1Category
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Category
     *
     * @maps body
     */
    public function setBody(?V1Category $body): void
    {
        $this->body = $body;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['body'] = $this->body;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
