<?php

declare(strict_types=1);

namespace Square\Models;

class V1CreateItemRequest implements \JsonSerializable
{
    /**
     * @var V1Item|null
     */
    private $body;

    /**
     * Returns Body.
     *
     * V1Item
     */
    public function getBody(): ?V1Item
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Item
     *
     * @maps body
     */
    public function setBody(?V1Item $body): void
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
