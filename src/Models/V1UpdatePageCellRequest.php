<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdatePageCellRequest implements \JsonSerializable
{
    /**
     * @var V1PageCell
     */
    private $body;

    /**
     * @param V1PageCell $body
     */
    public function __construct(V1PageCell $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * V1PageCell
     */
    public function getBody(): V1PageCell
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1PageCell
     *
     * @required
     * @maps body
     */
    public function setBody(V1PageCell $body): void
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
