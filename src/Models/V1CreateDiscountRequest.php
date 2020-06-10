<?php

declare(strict_types=1);

namespace Square\Models;

class V1CreateDiscountRequest implements \JsonSerializable
{
    /**
     * @var V1Discount|null
     */
    private $body;

    /**
     * Returns Body.
     *
     * V1Discount
     */
    public function getBody(): ?V1Discount
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1Discount
     *
     * @maps body
     */
    public function setBody(?V1Discount $body): void
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
