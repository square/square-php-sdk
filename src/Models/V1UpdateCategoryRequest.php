<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdateCategoryRequest implements \JsonSerializable
{
    /**
     * @var V1Category
     */
    private $body;

    /**
     * @param V1Category $body
     */
    public function __construct(V1Category $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * V1Category
     */
    public function getBody(): V1Category
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Category
     *
     * @required
     * @maps body
     */
    public function setBody(V1Category $body): void
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
