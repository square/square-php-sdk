<?php

namespace Square\Labor\BreakTypes\Requests;

use Square\Core\Json\JsonSerializableType;

class ListBreakTypesRequest extends JsonSerializableType
{
    /**
     * Filter the returned `BreakType` results to only those that are associated with the
     * specified location.
     *
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * The maximum number of `BreakType` results to return per page. The number can range between 1
     * and 200. The default is 200.
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @var ?string $cursor A pointer to the next page of `BreakType` results to fetch.
     */
    private ?string $cursor;

    /**
     * @param array{
     *   locationId?: ?string,
     *   limit?: ?int,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
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
