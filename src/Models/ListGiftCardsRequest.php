<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request to list gift cards. You can optionally specify a filter to retrieve a subset of
 * gift cards.
 */
class ListGiftCardsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * Returns Type.
     *
     * If a type is provided, gift cards of this type are returned
     * (see [GiftCardType]($m/GiftCardType)).
     * If no type is provided, it returns gift cards of all types.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * If a type is provided, gift cards of this type are returned
     * (see [GiftCardType]($m/GiftCardType)).
     * If no type is provided, it returns gift cards of all types.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns State.
     *
     * If the state is provided, it returns the gift cards in the specified state
     * (see [GiftCardStatus]($m/GiftCardStatus)).
     * Otherwise, it returns the gift cards of all states.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * If the state is provided, it returns the gift cards in the specified state
     * (see [GiftCardStatus]($m/GiftCardStatus)).
     * Otherwise, it returns the gift cards of all states.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Returns Limit.
     *
     * If a value is provided, it returns only that number of results per page.
     * The maximum number of results allowed per page is 50. The default value is 30.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * If a value is provided, it returns only that number of results per page.
     * The maximum number of results allowed per page is 50. The default value is 30.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * If a cursor is not provided, it returns the first page of the results.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * If a cursor is not provided, it returns the first page of the results.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
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
     * If a value is provided, returns only the gift cards linked to the specified customer
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * If a value is provided, returns only the gift cards linked to the specified customer
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->type)) {
            $json['type']        = $this->type;
        }
        if (isset($this->state)) {
            $json['state']       = $this->state;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }
        if (isset($this->customerId)) {
            $json['customer_id'] = $this->customerId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
