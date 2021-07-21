<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes a `PublishInvoice` request.
 */
class PublishInvoiceRequest implements \JsonSerializable
{
    /**
     * @var int
     */
    private $version;

    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * @param int $version
     */
    public function __construct(int $version)
    {
        $this->version = $version;
    }

    /**
     * Returns Version.
     *
     * The version of the [invoice]($m/Invoice) to publish.
     * This must match the current version of the invoice; otherwise, the request is rejected.
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The version of the [invoice]($m/Invoice) to publish.
     * This must match the current version of the invoice; otherwise, the request is rejected.
     *
     * @required
     * @maps version
     */
    public function setVersion(int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies the `PublishInvoice` request. If you do not
     * provide `idempotency_key` (or provide an empty string as the value), the endpoint
     * treats each request as independent.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-
     * apis/idempotency).
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies the `PublishInvoice` request. If you do not
     * provide `idempotency_key` (or provide an empty string as the value), the endpoint
     * treats each request as independent.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-
     * apis/idempotency).
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
        $json['version']             = $this->version;
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
