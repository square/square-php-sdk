<?php

namespace Square\CashDrawers\Shifts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SortOrder;

class ListShiftsRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the location to query for a list of cash drawer shifts.
     */
    private string $locationId;

    /**
     * The order in which cash drawer shifts are listed in the response,
     * based on their opened_at field. Default value: ASC
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    private ?string $sortOrder;

    /**
     * @var ?string $beginTime The inclusive start time of the query on opened_at, in ISO 8601 format.
     */
    private ?string $beginTime;

    /**
     * @var ?string $endTime The exclusive end date of the query on opened_at, in ISO 8601 format.
     */
    private ?string $endTime;

    /**
     * Number of cash drawer shift events in a page of results (200 by
     * default, 1000 max).
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @var ?string $cursor Opaque cursor for fetching the next page of results.
     */
    private ?string $cursor;

    /**
     * @param array{
     *   locationId: string,
     *   sortOrder?: ?value-of<SortOrder>,
     *   beginTime?: ?string,
     *   endTime?: ?string,
     *   limit?: ?int,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->beginTime = $values['beginTime'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setSortOrder(?string $value = null): self
    {
        $this->sortOrder = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * @param ?string $value
     */
    public function setBeginTime(?string $value = null): self
    {
        $this->beginTime = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    /**
     * @param ?string $value
     */
    public function setEndTime(?string $value = null): self
    {
        $this->endTime = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
        return $this;
    }
}
