<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdatePageRequest implements \JsonSerializable
{
    /**
     * @var V1Page
     */
    private $body;

    /**
     * @param V1Page $body
     */
    public function __construct(V1Page $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * V1Page
     */
    public function getBody(): V1Page
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Page
     *
     * @required
     * @maps body
     */
    public function setBody(V1Page $body): void
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
