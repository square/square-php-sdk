<?php

namespace Square\Labor\WorkweekConfigs\Requests;

use Square\Core\Json\JsonSerializableType;

class ListWorkweekConfigsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit The maximum number of `WorkweekConfigs` results to return per page.
     */
    private ?int $limit;

    /**
     * @var ?string $cursor A pointer to the next page of `WorkweekConfig` results to fetch.
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
