<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Retrieves details for a specific Card. Accessible via
 * HTTP requests at GET https://connect.squareup.com/v2/cards
 */
class ListCardsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var bool|null
     */
    private $includeDisabled;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Customer Id.
     *
     * Limit results to cards associated with the customer supplied.
     * By default, all cards owned by the merchant are returned.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * Limit results to cards associated with the customer supplied.
     * By default, all cards owned by the merchant are returned.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Include Disabled.
     *
     * Includes disabled cards.
     * By default, all enabled cards owned by the merchant are returned.
     */
    public function getIncludeDisabled(): ?bool
    {
        return $this->includeDisabled;
    }

    /**
     * Sets Include Disabled.
     *
     * Includes disabled cards.
     * By default, all enabled cards owned by the merchant are returned.
     *
     * @maps include_disabled
     */
    public function setIncludeDisabled(?bool $includeDisabled): void
    {
        $this->includeDisabled = $includeDisabled;
    }

    /**
     * Returns Reference Id.
     *
     * Limit results to cards associated with the reference_id supplied.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * Limit results to cards associated with the reference_id supplied.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps sort_order
     */
    public function setSortOrder(?string $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
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
            $json['cursor']           = $this->cursor;
        }
        if (isset($this->customerId)) {
            $json['customer_id']      = $this->customerId;
        }
        if (isset($this->includeDisabled)) {
            $json['include_disabled'] = $this->includeDisabled;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']     = $this->referenceId;
        }
        if (isset($this->sortOrder)) {
            $json['sort_order']       = $this->sortOrder;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
