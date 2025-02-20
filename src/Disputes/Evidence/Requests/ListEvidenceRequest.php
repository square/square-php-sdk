<?php

namespace Square\Disputes\Evidence\Requests;

use Square\Core\Json\JsonSerializableType;

class ListEvidenceRequest extends JsonSerializableType
{
    /**
     * @var string $disputeId The ID of the dispute.
     */
    private string $disputeId;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * @param array{
     *   disputeId: string,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->disputeId = $values['disputeId'];
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return string
     */
    public function getDisputeId(): string
    {
        return $this->disputeId;
    }

    /**
     * @param string $value
     */
    public function setDisputeId(string $value): self
    {
        $this->disputeId = $value;
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
