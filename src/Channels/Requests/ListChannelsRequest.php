<?php

namespace Square\Channels\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\ReferenceType;
use Square\Types\ChannelStatus;

class ListChannelsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ReferenceType> $referenceType Type of reference associated to channel
     */
    private ?string $referenceType;

    /**
     * @var ?string $referenceId id of reference associated to channel
     */
    private ?string $referenceId;

    /**
     * @var ?value-of<ChannelStatus> $status Status of channel
     */
    private ?string $status;

    /**
     * @var ?string $cursor Cursor to fetch the next result
     */
    private ?string $cursor;

    /**
     * Maximum number of results to return.
     * When not provided the returned results will be cap at 100 channels.
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @param array{
     *   referenceType?: ?value-of<ReferenceType>,
     *   referenceId?: ?string,
     *   status?: ?value-of<ChannelStatus>,
     *   cursor?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->referenceType = $values['referenceType'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return ?value-of<ReferenceType>
     */
    public function getReferenceType(): ?string
    {
        return $this->referenceType;
    }

    /**
     * @param ?value-of<ReferenceType> $value
     */
    public function setReferenceType(?string $value = null): self
    {
        $this->referenceType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
        return $this;
    }

    /**
     * @return ?value-of<ChannelStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<ChannelStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
}
