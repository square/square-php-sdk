<?php

namespace Square\CashDrawers\Shifts\Requests;

use Square\Core\Json\JsonSerializableType;

class GetShiftsRequest extends JsonSerializableType
{
    /**
     * @var string $shiftId The shift ID.
     */
    private string $shiftId;

    /**
     * @var string $locationId The ID of the location to retrieve cash drawer shifts from.
     */
    private string $locationId;

    /**
     * @param array{
     *   shiftId: string,
     *   locationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->shiftId = $values['shiftId'];
        $this->locationId = $values['locationId'];
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
}
