<?php

declare(strict_types=1);

namespace Square\Models;

class V1CreateModifierListRequest implements \JsonSerializable
{
    /**
     * @var V1ModifierList|null
     */
    private $body;

    /**
     * Returns Body.
     *
     * V1ModifierList
     */
    public function getBody(): ?V1ModifierList
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1ModifierList
     *
     * @maps body
     */
    public function setBody(?V1ModifierList $body): void
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
