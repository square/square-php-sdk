<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Filter criteria for searching transfer orders
 */
class TransferOrderFilter extends JsonSerializableType
{
    /**
     * @var ?array<string> $sourceLocationIds Filter by source location IDs
     */
    #[JsonProperty('source_location_ids'), ArrayType(['string'])]
    private ?array $sourceLocationIds;

    /**
     * @var ?array<string> $destinationLocationIds Filter by destination location IDs
     */
    #[JsonProperty('destination_location_ids'), ArrayType(['string'])]
    private ?array $destinationLocationIds;

    /**
     * Filter by order statuses
     * See [TransferOrderStatus](#type-transferorderstatus) for possible values
     *
     * @var ?array<value-of<TransferOrderStatus>> $statuses
     */
    #[JsonProperty('statuses'), ArrayType(['string'])]
    private ?array $statuses;

    /**
     * @param array{
     *   sourceLocationIds?: ?array<string>,
     *   destinationLocationIds?: ?array<string>,
     *   statuses?: ?array<value-of<TransferOrderStatus>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sourceLocationIds = $values['sourceLocationIds'] ?? null;
        $this->destinationLocationIds = $values['destinationLocationIds'] ?? null;
        $this->statuses = $values['statuses'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getSourceLocationIds(): ?array
    {
        return $this->sourceLocationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSourceLocationIds(?array $value = null): self
    {
        $this->sourceLocationIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getDestinationLocationIds(): ?array
    {
        return $this->destinationLocationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setDestinationLocationIds(?array $value = null): self
    {
        $this->destinationLocationIds = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<TransferOrderStatus>>
     */
    public function getStatuses(): ?array
    {
        return $this->statuses;
    }

    /**
     * @param ?array<value-of<TransferOrderStatus>> $value
     */
    public function setStatuses(?array $value = null): self
    {
        $this->statuses = $value;
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
