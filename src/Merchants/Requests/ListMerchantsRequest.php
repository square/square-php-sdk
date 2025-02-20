<?php

namespace Square\Merchants\Requests;

use Square\Core\Json\JsonSerializableType;

class ListMerchantsRequest extends JsonSerializableType
{
    /**
     * @var ?int $cursor The cursor generated by the previous response.
     */
    private ?int $cursor;

    /**
     * @param array{
     *   cursor?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getCursor(): ?int
    {
        return $this->cursor;
    }

    /**
     * @param ?int $value
     */
    public function setCursor(?int $value = null): self
    {
        $this->cursor = $value;
        return $this;
    }
}
