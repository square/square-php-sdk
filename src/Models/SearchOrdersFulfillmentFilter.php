<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Filter based on [order fulfillment]($m/OrderFulfillment) information.
 */
class SearchOrdersFulfillmentFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $fulfillmentTypes;

    /**
     * @var string[]|null
     */
    private $fulfillmentStates;

    /**
     * Returns Fulfillment Types.
     *
     * A list of [fulfillment types]($m/OrderFulfillmentType) to filter
     * for. The list returns orders if any of its fulfillments match any of the fulfillment types
     * listed in this field.
     * See [OrderFulfillmentType](#type-orderfulfillmenttype) for possible values
     *
     * @return string[]|null
     */
    public function getFulfillmentTypes(): ?array
    {
        return $this->fulfillmentTypes;
    }

    /**
     * Sets Fulfillment Types.
     *
     * A list of [fulfillment types]($m/OrderFulfillmentType) to filter
     * for. The list returns orders if any of its fulfillments match any of the fulfillment types
     * listed in this field.
     * See [OrderFulfillmentType](#type-orderfulfillmenttype) for possible values
     *
     * @maps fulfillment_types
     *
     * @param string[]|null $fulfillmentTypes
     */
    public function setFulfillmentTypes(?array $fulfillmentTypes): void
    {
        $this->fulfillmentTypes = $fulfillmentTypes;
    }

    /**
     * Returns Fulfillment States.
     *
     * A list of [fulfillment states]($m/OrderFulfillmentState) to filter
     * for. The list returns orders if any of its fulfillments match any of the
     * fulfillment states listed in this field.
     * See [OrderFulfillmentState](#type-orderfulfillmentstate) for possible values
     *
     * @return string[]|null
     */
    public function getFulfillmentStates(): ?array
    {
        return $this->fulfillmentStates;
    }

    /**
     * Sets Fulfillment States.
     *
     * A list of [fulfillment states]($m/OrderFulfillmentState) to filter
     * for. The list returns orders if any of its fulfillments match any of the
     * fulfillment states listed in this field.
     * See [OrderFulfillmentState](#type-orderfulfillmentstate) for possible values
     *
     * @maps fulfillment_states
     *
     * @param string[]|null $fulfillmentStates
     */
    public function setFulfillmentStates(?array $fulfillmentStates): void
    {
        $this->fulfillmentStates = $fulfillmentStates;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->fulfillmentTypes)) {
            $json['fulfillment_types']  = $this->fulfillmentTypes;
        }
        if (isset($this->fulfillmentStates)) {
            $json['fulfillment_states'] = $this->fulfillmentStates;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
