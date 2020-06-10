<?php

declare(strict_types=1);

namespace Square\Models;

class V1CreateFeeRequest implements \JsonSerializable
{
    /**
     * @var V1Fee|null
     */
    private $body;

    /**
     * Returns Body.
     *
     * V1Fee
     */
    public function getBody(): ?V1Fee
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Fee
     *
     * @maps body
     */
    public function setBody(?V1Fee $body): void
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
