<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListCashDrawerShiftsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $order;

    /**
     * @var string|null
     */
    private $beginTime;

    /**
     * @var string|null
     */
    private $endTime;

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
     * Returns Begin Time.
     *
     * The beginning of the requested reporting period, in ISO 8601 format. Default value: The current time
     * minus 90 days.
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * Sets Begin Time.
     *
     * The beginning of the requested reporting period, in ISO 8601 format. Default value: The current time
     * minus 90 days.
     *
     * @maps begin_time
     */
    public function setBeginTime(?string $beginTime): void
    {
        $this->beginTime = $beginTime;
    }

    /**
     * Returns End Time.
     *
     * The beginning of the requested reporting period, in ISO 8601 format. Default value: The current time.
     */
    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    /**
     * Sets End Time.
     *
     * The beginning of the requested reporting period, in ISO 8601 format. Default value: The current time.
     *
     * @maps end_time
     */
    public function setEndTime(?string $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['order']     = $this->order;
        $json['begin_time'] = $this->beginTime;
        $json['end_time']  = $this->endTime;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
