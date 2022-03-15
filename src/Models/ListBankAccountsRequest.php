<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Request object for fetching all `BankAccount`
 * objects linked to a account.
 */
class ListBankAccountsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * Returns Cursor.
     *
     * The pagination cursor returned by a previous call to this endpoint.
     * Use it in the next `ListBankAccounts` request to retrieve the next set
     * of results.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for
     * more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor returned by a previous call to this endpoint.
     * Use it in the next `ListBankAccounts` request to retrieve the next set
     * of results.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for
     * more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Limit.
     *
     * Upper limit on the number of bank accounts to return in the response.
     * Currently, 1000 is the largest supported limit. You can specify a limit
     * of up to 1000 bank accounts. This is also the default limit.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Upper limit on the number of bank accounts to return in the response.
     * Currently, 1000 is the largest supported limit. You can specify a limit
     * of up to 1000 bank accounts. This is also the default limit.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Location Id.
     *
     * Location ID. You can specify this optional filter
     * to retrieve only the linked bank accounts belonging to a specific location.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * Location ID. You can specify this optional filter
     * to retrieve only the linked bank accounts belonging to a specific location.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }
        if (isset($this->locationId)) {
            $json['location_id'] = $this->locationId;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
