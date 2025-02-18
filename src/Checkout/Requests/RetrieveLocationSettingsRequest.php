<?php

namespace Square\Checkout\Requests;

use Square\Core\Json\JsonSerializableType;

class RetrieveLocationSettingsRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the location for which to retrieve settings.
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
