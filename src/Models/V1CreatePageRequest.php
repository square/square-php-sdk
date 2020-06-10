<?php

declare(strict_types=1);

namespace Square\Models;

class V1CreatePageRequest implements \JsonSerializable
{
    /**
     * @var V1Page|null
     */
    private $body;

    /**
     * Returns Body.
     *
     * V1Page
     */
    public function getBody(): ?V1Page
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Page
     *
     * @maps body
     */
    public function setBody(?V1Page $body): void
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
