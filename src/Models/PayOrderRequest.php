<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in requests to the
 * [PayOrder](#endpoint-payorder) endpoint.
 */
class PayOrderRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var int|null
     */
    private $orderVersion;

    /**
     * @var string[]|null
     */
    private $paymentIds;

    /**
     * @param string $idempotencyKey
     */
    public function __construct(string $idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Idempotency Key.
     *
     * A value you specify that uniquely identifies this request among requests you've sent. If
     * you're unsure whether a particular payment request was completed successfully, you can reattempt
     * it with the same idempotency key without worrying about duplicate payments.
     *
     * See [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency) for more
     * information.
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A value you specify that uniquely identifies this request among requests you've sent. If
     * you're unsure whether a particular payment request was completed successfully, you can reattempt
     * it with the same idempotency key without worrying about duplicate payments.
     *
     * See [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency) for more
     * information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Order Version.
     *
     * The version of the order being paid. If not supplied, the latest version will be paid.
     */
    public function getOrderVersion(): ?int
    {
        return $this->orderVersion;
    }

    /**
     * Sets Order Version.
     *
     * The version of the order being paid. If not supplied, the latest version will be paid.
     *
     * @maps order_version
     */
    public function setOrderVersion(?int $orderVersion): void
    {
        $this->orderVersion = $orderVersion;
    }

    /**
     * Returns Payment Ids.
     *
     * The IDs of the [payments](#type-payment) to collect.
     * The payment total must match the order total.
     *
     * @return string[]|null
     */
    public function getPaymentIds(): ?array
    {
        return $this->paymentIds;
    }

    /**
     * Sets Payment Ids.
     *
     * The IDs of the [payments](#type-payment) to collect.
     * The payment total must match the order total.
     *
     * @maps payment_ids
     *
     * @param string[]|null $paymentIds
     */
    public function setPaymentIds(?array $paymentIds): void
    {
        $this->paymentIds = $paymentIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['order_version']  = $this->orderVersion;
        $json['payment_ids']    = $this->paymentIds;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
