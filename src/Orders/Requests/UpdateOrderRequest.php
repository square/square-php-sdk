<?php

namespace Square\Orders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Order;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class UpdateOrderRequest extends JsonSerializableType
{
    /**
     * @var string $orderId The ID of the order to update.
     */
    private string $orderId;

    /**
     * The [sparse order](https://developer.squareup.com/docs/orders-api/manage-orders/update-orders#sparse-order-objects)
     * containing only the fields to update and the version to which the update is
     * being applied.
     *
     * @var ?Order $order
     */
    #[JsonProperty('order')]
    private ?Order $order;

    /**
     * The [dot notation paths](https://developer.squareup.com/docs/orders-api/manage-orders/update-orders#identifying-fields-to-delete)
     * fields to clear. For example, `line_items[uid].note`.
     * For more information, see [Deleting fields](https://developer.squareup.com/docs/orders-api/manage-orders/update-orders#deleting-fields).
     *
     * @var ?array<string> $fieldsToClear
     */
    #[JsonProperty('fields_to_clear'), ArrayType(['string'])]
    private ?array $fieldsToClear;

    /**
     * A value you specify that uniquely identifies this update request.
     *
     * If you are unsure whether a particular update was applied to an order successfully,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate updates to the order.
     * The latest order version is returned.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @param array{
     *   orderId: string,
     *   order?: ?Order,
     *   fieldsToClear?: ?array<string>,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orderId = $values['orderId'];
        $this->order = $values['order'] ?? null;
        $this->fieldsToClear = $values['fieldsToClear'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
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
     * @return ?Order
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param ?Order $value
     */
    public function setOrder(?Order $value = null): self
    {
        $this->order = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getFieldsToClear(): ?array
    {
        return $this->fieldsToClear;
    }

    /**
     * @param ?array<string> $value
     */
    public function setFieldsToClear(?array $value = null): self
    {
        $this->fieldsToClear = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }
}
