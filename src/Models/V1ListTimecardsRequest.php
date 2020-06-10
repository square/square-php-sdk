<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListTimecardsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $order;

    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var string|null
     */
    private $beginClockinTime;

    /**
     * @var string|null
     */
    private $endClockinTime;

    /**
     * @var string|null
     */
    private $beginClockoutTime;

    /**
     * @var string|null
     */
    private $endClockoutTime;

    /**
     * @var string|null
     */
    private $beginUpdatedAt;

    /**
     * @var string|null
     */
    private $endUpdatedAt;

    /**
     * @var bool|null
     */
    private $deleted;

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
     * Returns Employee Id.
     *
     * If provided, the endpoint returns only timecards for the employee with the specified ID.
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * If provided, the endpoint returns only timecards for the employee with the specified ID.
     *
     * @maps employee_id
     */
    public function setEmployeeId(?string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Begin Clockin Time.
     *
     * If filtering results by their clockin_time field, the beginning of the requested reporting period,
     * in ISO 8601 format.
     */
    public function getBeginClockinTime(): ?string
    {
        return $this->beginClockinTime;
    }

    /**
     * Sets Begin Clockin Time.
     *
     * If filtering results by their clockin_time field, the beginning of the requested reporting period,
     * in ISO 8601 format.
     *
     * @maps begin_clockin_time
     */
    public function setBeginClockinTime(?string $beginClockinTime): void
    {
        $this->beginClockinTime = $beginClockinTime;
    }

    /**
     * Returns End Clockin Time.
     *
     * If filtering results by their clockin_time field, the end of the requested reporting period, in ISO
     * 8601 format.
     */
    public function getEndClockinTime(): ?string
    {
        return $this->endClockinTime;
    }

    /**
     * Sets End Clockin Time.
     *
     * If filtering results by their clockin_time field, the end of the requested reporting period, in ISO
     * 8601 format.
     *
     * @maps end_clockin_time
     */
    public function setEndClockinTime(?string $endClockinTime): void
    {
        $this->endClockinTime = $endClockinTime;
    }

    /**
     * Returns Begin Clockout Time.
     *
     * If filtering results by their clockout_time field, the beginning of the requested reporting period,
     * in ISO 8601 format.
     */
    public function getBeginClockoutTime(): ?string
    {
        return $this->beginClockoutTime;
    }

    /**
     * Sets Begin Clockout Time.
     *
     * If filtering results by their clockout_time field, the beginning of the requested reporting period,
     * in ISO 8601 format.
     *
     * @maps begin_clockout_time
     */
    public function setBeginClockoutTime(?string $beginClockoutTime): void
    {
        $this->beginClockoutTime = $beginClockoutTime;
    }

    /**
     * Returns End Clockout Time.
     *
     * If filtering results by their clockout_time field, the end of the requested reporting period, in ISO
     * 8601 format.
     */
    public function getEndClockoutTime(): ?string
    {
        return $this->endClockoutTime;
    }

    /**
     * Sets End Clockout Time.
     *
     * If filtering results by their clockout_time field, the end of the requested reporting period, in ISO
     * 8601 format.
     *
     * @maps end_clockout_time
     */
    public function setEndClockoutTime(?string $endClockoutTime): void
    {
        $this->endClockoutTime = $endClockoutTime;
    }

    /**
     * Returns Begin Updated At.
     *
     * If filtering results by their updated_at field, the beginning of the requested reporting period, in
     * ISO 8601 format.
     */
    public function getBeginUpdatedAt(): ?string
    {
        return $this->beginUpdatedAt;
    }

    /**
     * Sets Begin Updated At.
     *
     * If filtering results by their updated_at field, the beginning of the requested reporting period, in
     * ISO 8601 format.
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
     * If filtering results by their updated_at field, the end of the requested reporting period, in ISO
     * 8601 format.
     */
    public function getEndUpdatedAt(): ?string
    {
        return $this->endUpdatedAt;
    }

    /**
     * Sets End Updated At.
     *
     * If filtering results by their updated_at field, the end of the requested reporting period, in ISO
     * 8601 format.
     *
     * @maps end_updated_at
     */
    public function setEndUpdatedAt(?string $endUpdatedAt): void
    {
        $this->endUpdatedAt = $endUpdatedAt;
    }

    /**
     * Returns Deleted.
     *
     * If true, only deleted timecards are returned. If false, only valid timecards are returned.If you
     * don't provide this parameter, both valid and deleted timecards are returned.
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * Sets Deleted.
     *
     * If true, only deleted timecards are returned. If false, only valid timecards are returned.If you
     * don't provide this parameter, both valid and deleted timecards are returned.
     *
     * @maps deleted
     */
    public function setDeleted(?bool $deleted): void
    {
        $this->deleted = $deleted;
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
        $json['order']             = $this->order;
        $json['employee_id']       = $this->employeeId;
        $json['begin_clockin_time'] = $this->beginClockinTime;
        $json['end_clockin_time']  = $this->endClockinTime;
        $json['begin_clockout_time'] = $this->beginClockoutTime;
        $json['end_clockout_time'] = $this->endClockoutTime;
        $json['begin_updated_at']  = $this->beginUpdatedAt;
        $json['end_updated_at']    = $this->endUpdatedAt;
        $json['deleted']           = $this->deleted;
        $json['limit']             = $this->limit;
        $json['batch_token']       = $this->batchToken;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
