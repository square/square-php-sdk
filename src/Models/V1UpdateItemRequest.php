<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdateItemRequest implements \JsonSerializable
{
    /**
     * @var V1Item
     */
    private $body;

    /**
     * @param V1Item $body
     */
    public function __construct(V1Item $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * V1Item
     */
    public function getBody(): V1Item
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Item
     *
     * @required
     * @maps body
     */
    public function setBody(V1Item $body): void
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
