<?php

namespace Square\V1Transactions\Requests;

use Square\Core\Json\JsonSerializableType;

class V1RetrieveOrderRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the order's associated location.
     */
    private string $locationId;

    /**
     * @var string $orderId The order's Square-issued ID. You obtain this value from Order objects returned by the List Orders endpoint
     */
    private string $orderId;

    /**
     * @param array{
     *   locationId: string,
     *   orderId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->orderId = $values['orderId'];
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $value
     */
    public function setOrderId(string $value): self
    {
        $this->orderId = $value;
        return $this;
    }
}
