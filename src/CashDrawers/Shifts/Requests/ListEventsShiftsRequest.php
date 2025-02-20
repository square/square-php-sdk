<?php

namespace Square\CashDrawers\Shifts\Requests;

use Square\Core\Json\JsonSerializableType;

class ListEventsShiftsRequest extends JsonSerializableType
{
    /**
     * @var string $shiftId The shift ID.
     */
    private string $shiftId;

    /**
     * @var string $locationId The ID of the location to list cash drawer shifts for.
     */
    private string $locationId;

    /**
     * Number of resources to be returned in a page of results (200 by
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
     *   shiftId: string,
     *   locationId: string,
     *   limit?: ?int,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->shiftId = $values['shiftId'];
        $this->locationId = $values['locationId'];
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return string
     */
    public function getShiftId(): string
    {
        return $this->shiftId;
    }

    /**
     * @param string $value
     */
    public function setShiftId(string $value): self
    {
        $this->shiftId = $value;
        return $this;
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
