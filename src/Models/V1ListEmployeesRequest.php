<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListEmployeesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $order;

    /**
     * @var string|null
     */
    private $beginUpdatedAt;

    /**
     * @var string|null
     */
    private $endUpdatedAt;

    /**
     * @var string|null
     */
    private $beginCreatedAt;

    /**
     * @var string|null
     */
    private $endCreatedAt;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $externalId;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $batchToken;

    /**
     * Returns Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * Sets Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps order
     */
    public function setOrder(?string $order): void
    {
        $this->order = $order;
    }

    /**
     * Returns Begin Updated At.
     *
     * If filtering results by their updated_at field, the beginning of the requested reporting period, in
     * ISO 8601 format
     */
    public function getBeginUpdatedAt(): ?string
    {
        return $this->beginUpdatedAt;
    }

    /**
     * Sets Begin Updated At.
     *
     * If filtering results by their updated_at field, the beginning of the requested reporting period, in
     * ISO 8601 format
     *
     * @maps begin_updated_at
     */
    public function setBeginUpdatedAt(?string $beginUpdatedAt): void
    {
        $this->beginUpdatedAt = $beginUpdatedAt;
    }

    /**
     * Returns End Updated At.
     *
     * If filtering results by there updated_at field, the end of the requested reporting period, in ISO
     * 8601 format.
     */
    public function getEndUpdatedAt(): ?string
    {
        return $this->endUpdatedAt;
    }

    /**
     * Sets End Updated At.
     *
     * If filtering results by there updated_at field, the end of the requested reporting period, in ISO
     * 8601 format.
     *
     * @maps end_updated_at
     */
    public function setEndUpdatedAt(?string $endUpdatedAt): void
    {
        $this->endUpdatedAt = $endUpdatedAt;
    }

    /**
     * Returns Begin Created At.
     *
     * If filtering results by their created_at field, the beginning of the requested reporting period, in
     * ISO 8601 format.
     */
    public function getBeginCreatedAt(): ?string
    {
        return $this->beginCreatedAt;
    }

    /**
     * Sets Begin Created At.
     *
     * If filtering results by their created_at field, the beginning of the requested reporting period, in
     * ISO 8601 format.
     *
     * @maps begin_created_at
     */
    public function setBeginCreatedAt(?string $beginCreatedAt): void
    {
        $this->beginCreatedAt = $beginCreatedAt;
    }

    /**
     * Returns End Created At.
     *
     * If filtering results by their created_at field, the end of the requested reporting period, in ISO
     * 8601 format.
     */
    public function getEndCreatedAt(): ?string
    {
        return $this->endCreatedAt;
    }

    /**
     * Sets End Created At.
     *
     * If filtering results by their created_at field, the end of the requested reporting period, in ISO
     * 8601 format.
     *
     * @maps end_created_at
     */
    public function setEndCreatedAt(?string $endCreatedAt): void
    {
        $this->endCreatedAt = $endCreatedAt;
    }

    /**
     * Returns Status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns External Id.
     *
     * If provided, the endpoint returns only employee entities with the specified external_id.
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * Sets External Id.
     *
     * If provided, the endpoint returns only employee entities with the specified external_id.
     *
     * @maps external_id
     */
    public function setExternalId(?string $externalId): void
    {
        $this->externalId = $externalId;
    }

    /**
     * Returns Limit.
     *
     * The maximum integer number of employee entities to return in a single response. Default 100, maximum
     * 200.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum integer number of employee entities to return in a single response. Default 100, maximum
     * 200.
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
        if (isset($this->order)) {
            $json['order']            = $this->order;
        }
        if (isset($this->beginUpdatedAt)) {
            $json['begin_updated_at'] = $this->beginUpdatedAt;
        }
        if (isset($this->endUpdatedAt)) {
            $json['end_updated_at']   = $this->endUpdatedAt;
        }
        if (isset($this->beginCreatedAt)) {
            $json['begin_created_at'] = $this->beginCreatedAt;
        }
        if (isset($this->endCreatedAt)) {
            $json['end_created_at']   = $this->endCreatedAt;
        }
        if (isset($this->status)) {
            $json['status']           = $this->status;
        }
        if (isset($this->externalId)) {
            $json['external_id']      = $this->externalId;
        }
        if (isset($this->limit)) {
            $json['limit']            = $this->limit;
        }
        if (isset($this->batchToken)) {
            $json['batch_token']      = $this->batchToken;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
