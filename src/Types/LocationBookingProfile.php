<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The booking profile of a seller's location, including the location's ID and whether the location is enabled for online booking.
 */
class LocationBookingProfile extends JsonSerializableType
{
    /**
     * @var ?string $locationId The ID of the [location](entity:Location).
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $bookingSiteUrl Url for the online booking site for this location.
     */
    #[JsonProperty('booking_site_url')]
    private ?string $bookingSiteUrl;

    /**
     * @var ?bool $onlineBookingEnabled Indicates whether the location is enabled for online booking.
     */
    #[JsonProperty('online_booking_enabled')]
    private ?bool $onlineBookingEnabled;

    /**
     * @param array{
     *   locationId?: ?string,
     *   bookingSiteUrl?: ?string,
     *   onlineBookingEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->bookingSiteUrl = $values['bookingSiteUrl'] ?? null;
        $this->onlineBookingEnabled = $values['onlineBookingEnabled'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBookingSiteUrl(): ?string
    {
        return $this->bookingSiteUrl;
    }

    /**
     * @param ?string $value
     */
    public function setBookingSiteUrl(?string $value = null): self
    {
        $this->bookingSiteUrl = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getOnlineBookingEnabled(): ?bool
    {
        return $this->onlineBookingEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setOnlineBookingEnabled(?bool $value = null): self
    {
        $this->onlineBookingEnabled = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
