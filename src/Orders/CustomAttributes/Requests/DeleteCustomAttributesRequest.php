<?php

namespace Square\Orders\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var string $orderId The ID of the target [order](entity:Order).
     */
    private string $orderId;

    /**
     * The key of the custom attribute to delete.  This key must match the key of an
     * existing custom attribute definition.
     *
     * @var string $customAttributeKey
     */
    private string $customAttributeKey;

    /**
     * @param array{
     *   orderId: string,
     *   customAttributeKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orderId = $values['orderId'];
        $this->customAttributeKey = $values['customAttributeKey'];
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

    /**
     * @return string
     */
    public function getCustomAttributeKey(): string
    {
        return $this->customAttributeKey;
    }

    /**
     * @param string $value
     */
    public function setCustomAttributeKey(string $value): self
    {
        $this->customAttributeKey = $value;
        return $this;
    }
}
