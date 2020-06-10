<?php

declare(strict_types=1);

namespace Square\Models;

class CreateOrderRequest implements \JsonSerializable
{
    /**
     * @var Order|null
     */
    private $order;

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
     * Returns Idempotency Key.
     *
     * A value you specify that uniquely identifies this
     * order among orders you've created.
     *
     * If you're unsure whether a particular order was created successfully,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate orders.
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
     * A value you specify that uniquely identifies this
     * order among orders you've created.
     *
     * If you're unsure whether a particular order was created successfully,
     * you can reattempt it with the same idempotency key without
     * worrying about creating duplicate orders.
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
        $json['idempotency_key'] = $this->idempotencyKey;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
