<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdateModifierOptionRequest implements \JsonSerializable
{
    /**
     * @var V1ModifierOption
     */
    private $body;

    /**
     * @param V1ModifierOption $body
     */
    public function __construct(V1ModifierOption $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * V1ModifierOption
     */
    public function getBody(): V1ModifierOption
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1ModifierOption
     *
     * @required
     * @maps body
     */
    public function setBody(V1ModifierOption $body): void
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
