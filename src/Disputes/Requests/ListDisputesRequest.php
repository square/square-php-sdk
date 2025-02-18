<?php

namespace Square\Disputes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\DisputeState;

class ListDisputesRequest extends JsonSerializableType
{
    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * @var ?value-of<DisputeState> $states The dispute states used to filter the result. If not specified, the endpoint returns all disputes.
     */
    private ?string $states;

    /**
     * The ID of the location for which to return a list of disputes.
     * If not specified, the endpoint returns disputes associated with all locations.
     *
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * @param array{
     *   cursor?: ?string,
     *   states?: ?value-of<DisputeState>,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->states = $values['states'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
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
     * @return ?value-of<DisputeState>
     */
    public function getStates(): ?string
    {
        return $this->states;
    }

    /**
     * @param ?value-of<DisputeState> $value
     */
    public function setStates(?string $value = null): self
    {
        $this->states = $value;
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
