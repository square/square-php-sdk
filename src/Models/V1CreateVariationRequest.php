<?php

declare(strict_types=1);

namespace Square\Models;

class V1CreateVariationRequest implements \JsonSerializable
{
    /**
     * @var V1Variation|null
     */
    private $body;

    /**
     * Returns Body.
     *
     * V1Variation
     */
    public function getBody(): ?V1Variation
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Variation
     *
     * @maps body
     */
    public function setBody(?V1Variation $body): void
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
