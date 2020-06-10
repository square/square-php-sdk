<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListItemsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $batchToken;

    /**
     * Returns Batch Token.
     *
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint.
     */
    public function getBatchToken(): ?string
    {
        return $this->batchToken;
    }

    /**
     * Sets Batch Token.
     *
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint.
     *
     * @maps batch_token
     */
    public function setBatchToken(?string $batchToken): void
    {
        $this->batchToken = $batchToken;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['batch_token'] = $this->batchToken;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
