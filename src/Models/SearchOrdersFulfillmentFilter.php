<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Filter based on [Order Fulfillment](#type-orderfulfillment) information.
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
     * List of [fulfillment types](#type-orderfulfillmenttype) to filter
     * for. Will return orders if any of its fulfillments match any of the fulfillment types
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
     * List of [fulfillment types](#type-orderfulfillmenttype) to filter
     * for. Will return orders if any of its fulfillments match any of the fulfillment types
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
     * List of [fulfillment states](#type-orderfulfillmentstate) to filter
     * for. Will return orders if any of its fulfillments match any of the
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
     * List of [fulfillment states](#type-orderfulfillmentstate) to filter
     * for. Will return orders if any of its fulfillments match any of the
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
        $json['fulfillment_types'] = $this->fulfillmentTypes;
        $json['fulfillment_states'] = $this->fulfillmentStates;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
