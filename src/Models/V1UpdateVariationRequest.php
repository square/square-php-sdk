<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdateVariationRequest implements \JsonSerializable
{
    /**
     * @var V1Variation
     */
    private $body;

    /**
     * @param V1Variation $body
     */
    public function __construct(V1Variation $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * V1Variation
     */
    public function getBody(): V1Variation
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Variation
     *
     * @required
     * @maps body
     */
    public function setBody(V1Variation $body): void
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
