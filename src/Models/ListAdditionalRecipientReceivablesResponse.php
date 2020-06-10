<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [ListAdditionalRecipientReceivables](#endpoint-listadditionalrecipientreceivables)
 * endpoint.
 *
 * One of `errors` or `additional_recipient_receivables` is present in a given response (never both).
 */
class ListAdditionalRecipientReceivablesResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var AdditionalRecipientReceivable[]|null
     */
    private $receivables;

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
     * Returns Receivables.
     *
     * An array of AdditionalRecipientReceivables that match your query.
     *
     * @return AdditionalRecipientReceivable[]|null
     */
    public function getReceivables(): ?array
    {
        return $this->receivables;
    }

    /**
     * Sets Receivables.
     *
     * An array of AdditionalRecipientReceivables that match your query.
     *
     * @maps receivables
     *
     * @param AdditionalRecipientReceivable[]|null $receivables
     */
    public function setReceivables(?array $receivables): void
    {
        $this->receivables = $receivables;
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
        $json['errors']      = $this->errors;
        $json['receivables'] = $this->receivables;
        $json['cursor']      = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
