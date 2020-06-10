<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [ListAdditionalRecipientReceivableRefunds](#endpoint-
 * listadditionalrecipientreceivablerefunds) endpoint.
 *
 * One of `errors` or `additional_recipient_receivable_refunds` is present in a given response (never
 * both).
 */
class ListAdditionalRecipientReceivableRefundsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var AdditionalRecipientReceivableRefund[]|null
     */
    private $receivableRefunds;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Receivable Refunds.
     *
     * An array of AdditionalRecipientReceivableRefunds that match your query.
     *
     * @return AdditionalRecipientReceivableRefund[]|null
     */
    public function getReceivableRefunds(): ?array
    {
        return $this->receivableRefunds;
    }

    /**
     * Sets Receivable Refunds.
     *
     * An array of AdditionalRecipientReceivableRefunds that match your query.
     *
     * @maps receivable_refunds
     *
     * @param AdditionalRecipientReceivableRefund[]|null $receivableRefunds
     */
    public function setReceivableRefunds(?array $receivableRefunds): void
    {
        $this->receivableRefunds = $receivableRefunds;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor for retrieving the next set of results,
     * if any remain. Provide this value as the `cursor` parameter in a subsequent
     * request to this endpoint.
     *
     * See [Paginating results](#paginatingresults) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor for retrieving the next set of results,
     * if any remain. Provide this value as the `cursor` parameter in a subsequent
     * request to this endpoint.
     *
     * See [Paginating results](#paginatingresults) for more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']            = $this->errors;
        $json['receivable_refunds'] = $this->receivableRefunds;
        $json['cursor']            = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
