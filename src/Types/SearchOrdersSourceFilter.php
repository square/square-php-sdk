<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A filter based on order `source` information.
 */
class SearchOrdersSourceFilter extends JsonSerializableType
{
    /**
     * Filters by the [Source](entity:OrderSource) `name`. The filter returns any orders
     * with a `source.name` that matches any of the listed source names.
     *
     * Max: 10 source names.
     *
     * @var ?array<string> $sourceNames
     */
    #[JsonProperty('source_names'), ArrayType(['string'])]
    private ?array $sourceNames;

    /**
     * Filters by the [Source](entity:OrderSource) `applicationId`. The filter returns any orders
     * with a `source.applicationId` that matches any of the listed source applicationIds.
     *
     * Max: 100 source applicationIds.
     *
     * @var ?array<string> $sourceApplicationIds
     */
    #[JsonProperty('source_application_ids'), ArrayType(['string'])]
    private ?array $sourceApplicationIds;

    /**
     * Filters by the [Source](entity:OrderSource) `clientOu`. The filter returns any orders
     * with a `source.clientOu` that matches any of the listed source clientOus.
     *
     * Max: 100 source clientOus.
     *
     * @var ?array<string> $sourceClientOus
     */
    #[JsonProperty('source_client_ous'), ArrayType(['string'])]
    private ?array $sourceClientOus;

    /**
     * @param array{
     *   sourceNames?: ?array<string>,
     *   sourceApplicationIds?: ?array<string>,
     *   sourceClientOus?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sourceNames = $values['sourceNames'] ?? null;
        $this->sourceApplicationIds = $values['sourceApplicationIds'] ?? null;
        $this->sourceClientOus = $values['sourceClientOus'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getSourceNames(): ?array
    {
        return $this->sourceNames;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSourceNames(?array $value = null): self
    {
        $this->sourceNames = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getSourceApplicationIds(): ?array
    {
        return $this->sourceApplicationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSourceApplicationIds(?array $value = null): self
    {
        $this->sourceApplicationIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getSourceClientOus(): ?array
    {
        return $this->sourceClientOus;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSourceClientOus(?array $value = null): self
    {
        $this->sourceClientOus = $value;
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
