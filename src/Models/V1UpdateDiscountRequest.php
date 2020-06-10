<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdateDiscountRequest implements \JsonSerializable
{
    /**
     * @var V1Discount
     */
    private $body;

    /**
     * @param V1Discount $body
     */
    public function __construct(V1Discount $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * V1Discount
     */
    public function getBody(): V1Discount
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Discount
     *
     * @required
     * @maps body
     */
    public function setBody(V1Discount $body): void
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
