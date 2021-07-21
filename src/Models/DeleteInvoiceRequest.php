<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes a `DeleteInvoice` request.
 */
class DeleteInvoiceRequest implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $version;

    /**
     * Returns Version.
     *
     * The version of the [invoice]($m/Invoice) to delete.
     * If you do not know the version, you can call [GetInvoice]($e/Invoices/GetInvoice) or
     * [ListInvoices]($e/Invoices/ListInvoices).
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The version of the [invoice]($m/Invoice) to delete.
     * If you do not know the version, you can call [GetInvoice]($e/Invoices/GetInvoice) or
     * [ListInvoices]($e/Invoices/ListInvoices).
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->version)) {
            $json['version'] = $this->version;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
