<?php

namespace Square\Bookings\LocationProfiles\Requests;

use Square\Core\Json\JsonSerializableType;

class ListLocationProfilesRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit The maximum number of results to return in a paged response.
     */
    private ?int $limit;

    /**
     * @var ?string $cursor The pagination cursor from the preceding response to return the next page of the results. Do not set this when retrieving the first page of the results.
     */
    private ?string $cursor;

    /**
     * @param array{
     *   limit?: ?int,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
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
