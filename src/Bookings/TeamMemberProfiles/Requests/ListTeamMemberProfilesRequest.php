<?php

namespace Square\Bookings\TeamMemberProfiles\Requests;

use Square\Core\Json\JsonSerializableType;

class ListTeamMemberProfilesRequest extends JsonSerializableType
{
    /**
     * @var ?bool $bookableOnly Indicates whether to include only bookable team members in the returned result (`true`) or not (`false`).
     */
    private ?bool $bookableOnly;

    /**
     * @var ?int $limit The maximum number of results to return in a paged response.
     */
    private ?int $limit;

    /**
     * @var ?string $cursor The pagination cursor from the preceding response to return the next page of the results. Do not set this when retrieving the first page of the results.
     */
    private ?string $cursor;

    /**
     * @var ?string $locationId Indicates whether to include only team members enabled at the given location in the returned result.
     */
    private ?string $locationId;

    /**
     * @param array{
     *   bookableOnly?: ?bool,
     *   limit?: ?int,
     *   cursor?: ?string,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bookableOnly = $values['bookableOnly'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getBookableOnly(): ?bool
    {
        return $this->bookableOnly;
    }

    /**
     * @param ?bool $value
     */
    public function setBookableOnly(?bool $value = null): self
    {
        $this->bookableOnly = $value;
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
}
