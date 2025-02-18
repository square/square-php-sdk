<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;

class RetrieveLocationBookingProfileRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the location to retrieve the booking profile.
     */
    private string $locationId;

    /**
     * @param array{
     *   locationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
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
