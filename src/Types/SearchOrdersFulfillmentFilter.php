<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Filter based on [order fulfillment](entity:Fulfillment) information.
 */
class SearchOrdersFulfillmentFilter extends JsonSerializableType
{
    /**
     * A list of [fulfillment types](entity:FulfillmentType) to filter
     * for. The list returns orders if any of its fulfillments match any of the fulfillment types
     * listed in this field.
     * See [FulfillmentType](#type-fulfillmenttype) for possible values
     *
     * @var ?array<value-of<FulfillmentType>> $fulfillmentTypes
     */
    #[JsonProperty('fulfillment_types'), ArrayType(['string'])]
    private ?array $fulfillmentTypes;

    /**
     * A list of [fulfillment states](entity:FulfillmentState) to filter
     * for. The list returns orders if any of its fulfillments match any of the
     * fulfillment states listed in this field.
     * See [FulfillmentState](#type-fulfillmentstate) for possible values
     *
     * @var ?array<value-of<FulfillmentState>> $fulfillmentStates
     */
    #[JsonProperty('fulfillment_states'), ArrayType(['string'])]
    private ?array $fulfillmentStates;

    /**
     * @param array{
     *   fulfillmentTypes?: ?array<value-of<FulfillmentType>>,
     *   fulfillmentStates?: ?array<value-of<FulfillmentState>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fulfillmentTypes = $values['fulfillmentTypes'] ?? null;
        $this->fulfillmentStates = $values['fulfillmentStates'] ?? null;
    }

    /**
     * @return ?array<value-of<FulfillmentType>>
     */
    public function getFulfillmentTypes(): ?array
    {
        return $this->fulfillmentTypes;
    }

    /**
     * @param ?array<value-of<FulfillmentType>> $value
     */
    public function setFulfillmentTypes(?array $value = null): self
    {
        $this->fulfillmentTypes = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<FulfillmentState>>
     */
    public function getFulfillmentStates(): ?array
    {
        return $this->fulfillmentStates;
    }

    /**
     * @param ?array<value-of<FulfillmentState>> $value
     */
    public function setFulfillmentStates(?array $value = null): self
    {
        $this->fulfillmentStates = $value;
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
