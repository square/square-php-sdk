<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListInventoryRequest implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $batchToken;

    /**
     * Returns Limit.
     *
     * The maximum number of inventory entries to return in a single response. This value cannot exceed
     * 1000.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of inventory entries to return in a single response. This value cannot exceed
     * 1000.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

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
        $json['limit']      = $this->limit;
        $json['batch_token'] = $this->batchToken;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
