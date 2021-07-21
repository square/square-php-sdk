<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes a `UpdateInvoice` request.
 */
class UpdateInvoiceRequest implements \JsonSerializable
{
    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * @var string[]|null
     */
    private $fieldsToClear;

    /**
     * @param Invoice $invoice
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Returns Invoice.
     *
     * Stores information about an invoice. You use the Invoices API to create and manage
     * invoices. For more information, see [Manage Invoices Using the Invoices API](https://developer.
     * squareup.com/docs/invoices-api/overview).
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    /**
     * Sets Invoice.
     *
     * Stores information about an invoice. You use the Invoices API to create and manage
     * invoices. For more information, see [Manage Invoices Using the Invoices API](https://developer.
     * squareup.com/docs/invoices-api/overview).
     *
     * @required
     * @maps invoice
     */
    public function setInvoice(Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies the `UpdateInvoice` request. If you do not
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
     * A unique string that identifies the `UpdateInvoice` request. If you do not
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
     * Returns Fields to Clear.
     *
     * The list of fields to clear.
     * For examples, see [Update an invoice](https://developer.squareup.com/docs/invoices-
     * api/overview#update-an-invoice).
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
     * The list of fields to clear.
     * For examples, see [Update an invoice](https://developer.squareup.com/docs/invoices-
     * api/overview#update-an-invoice).
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['invoice']             = $this->invoice;
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }
        if (isset($this->fieldsToClear)) {
            $json['fields_to_clear'] = $this->fieldsToClear;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
