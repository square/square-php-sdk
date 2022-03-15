<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->fulfillmentTypes)) {
            $json['fulfillment_types']  = $this->fulfillmentTypes;
        }
        if (isset($this->fulfillmentStates)) {
            $json['fulfillment_states'] = $this->fulfillmentStates;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
