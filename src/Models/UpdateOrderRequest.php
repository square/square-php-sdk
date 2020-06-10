<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in requests to the
 * [UpdateOrder](#endpoint-orders-updateorder) endpoint.
 */
class UpdateOrderRequest implements \JsonSerializable
{
    /**
     * @var Order|null
     */
    private $order;

    /**
     * @var string[]|null
     */
    private $fieldsToClear;

    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * Returns Order.
     *
     * Contains all information related to a single order to process with Square,
     * including line items that specify the products to purchase. Order objects also
     * include information on any associated tenders, refunds, and returns.
     *
     * All Connect V2 Transactions have all been converted to Orders including all associated
     * itemization data.
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * Sets Order.
     *
     * Contains all information related to a single order to process with Square,
     * including line items that specify the products to purchase. Order objects also
     * include information on any associated tenders, refunds, and returns.
     *
     * All Connect V2 Transactions have all been converted to Orders including all associated
     * itemization data.
     *
     * @maps order
     */
    public function setOrder(?Order $order): void
    {
        $this->order = $order;
    }

    /**
     * Returns Fields to Clear.
     *
     * The [dot notation paths](https://developer.squareup.com/docs/orders-api/manage-orders#on-dot-
     * notation)
     * fields to clear. For example, `line_items[uid].note`
     * [Read more about Deleting fields](https://developer.squareup.com/docs/orders-api/manage-
     * orders#delete-fields).
     *
     * @return string[]|null
     */
    public function getFieldsToClear(): ?array
    {
        return $this->fieldsToClear;
    }

    /**
     * Sets Fields to Clear.
     *
     * The [dot notation paths](https://developer.squareup.com/docs/orders-api/manage-orders#on-dot-
     * notation)
     * fields to clear. For example, `line_items[uid].note`
     * [Read more about Deleting fields](https://developer.squareup.com/docs/orders-api/manage-
     * orders#delete-fields).
     *
     * @maps fields_to_clear
     *
     * @param string[]|null $fieldsToClear
     */
    public function setFieldsToClear(?array $fieldsToClear): void
    {
        $this->fieldsToClear = $fieldsToClear;
    }

    /**
     * Returns Idempotency Key.
     *
     * A value you specify that uniquely identifies this update request
     *
     * If you're unsure whether a particular update was applied to an order successfully,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate updates to the order.
     * The latest order version will be returned.
     *
     * See [Idempotency](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A value you specify that uniquely identifies this update request
     *
     * If you're unsure whether a particular update was applied to an order successfully,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate updates to the order.
     * The latest order version will be returned.
     *
     * See [Idempotency](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey(?string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['order']          = $this->order;
        $json['fields_to_clear'] = $this->fieldsToClear;
        $json['idempotency_key'] = $this->idempotencyKey;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
