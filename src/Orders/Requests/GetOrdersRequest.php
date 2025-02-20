<?php

namespace Square\Orders\Requests;

use Square\Core\Json\JsonSerializableType;

class GetOrdersRequest extends JsonSerializableType
{
    /**
     * @var string $orderId The ID of the order to retrieve.
     */
    private string $orderId;

    /**
     * @param array{
     *   orderId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orderId = $values['orderId'];
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
