<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents one delete within the bulk operation.
 */
class BulkDeleteOrderCustomAttributesRequestDeleteCustomAttribute extends JsonSerializableType
{
    /**
     * The key of the custom attribute to delete.  This key must match the key
     * of an existing custom attribute definition.
     *
     * @var ?string $key
     */
    #[JsonProperty('key')]
    private ?string $key;

    /**
     * @var string $orderId The ID of the target [order](entity:Order).
     */
    #[JsonProperty('order_id')]
    private string $orderId;

    /**
     * @param array{
     *   orderId: string,
     *   key?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'] ?? null;
        $this->orderId = $values['orderId'];
    }

    /**
     * @return ?string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @param ?string $value
     */
    public function setKey(?string $value = null): self
    {
        $this->key = $value;
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
