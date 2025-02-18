<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;

class ListBookingsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit The maximum number of results per page to return in a paged response.
     */
    private ?int $limit;

    /**
     * @var ?string $cursor The pagination cursor from the preceding response to return the next page of the results. Do not set this when retrieving the first page of the results.
     */
    private ?string $cursor;

    /**
     * @var ?string $customerId The [customer](entity:Customer) for whom to retrieve bookings. If this is not set, bookings for all customers are retrieved.
     */
    private ?string $customerId;

    /**
     * @var ?string $teamMemberId The team member for whom to retrieve bookings. If this is not set, bookings of all members are retrieved.
     */
    private ?string $teamMemberId;

    /**
     * @var ?string $locationId The location for which to retrieve bookings. If this is not set, all locations' bookings are retrieved.
     */
    private ?string $locationId;

    /**
     * @var ?string $startAtMin The RFC 3339 timestamp specifying the earliest of the start time. If this is not set, the current time is used.
     */
    private ?string $startAtMin;

    /**
     * @var ?string $startAtMax The RFC 3339 timestamp specifying the latest of the start time. If this is not set, the time of 31 days after `start_at_min` is used.
     */
    private ?string $startAtMax;

    /**
     * @param array{
     *   limit?: ?int,
     *   cursor?: ?string,
     *   customerId?: ?string,
     *   teamMemberId?: ?string,
     *   locationId?: ?string,
     *   startAtMin?: ?string,
     *   startAtMax?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->startAtMin = $values['startAtMin'] ?? null;
        $this->startAtMax = $values['startAtMax'] ?? null;
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

    /**
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamMemberId(?string $value = null): self
    {
        $this->teamMemberId = $value;
        return $this;
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
    public function getStartAtMin(): ?string
    {
        return $this->startAtMin;
    }

    /**
     * @param ?string $value
     */
    public function setStartAtMin(?string $value = null): self
    {
        $this->startAtMin = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStartAtMax(): ?string
    {
        return $this->startAtMax;
    }

    /**
     * @param ?string $value
     */
    public function setStartAtMax(?string $value = null): self
    {
        $this->startAtMax = $value;
        return $this;
    }
}
