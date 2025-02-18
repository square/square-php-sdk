<?php

namespace Square\GiftCards\Requests;

use Square\Core\Json\JsonSerializableType;

class ListGiftCardsRequest extends JsonSerializableType
{
    /**
     * If a [type](entity:GiftCardType) is provided, the endpoint returns gift cards of the specified type.
     * Otherwise, the endpoint returns gift cards of all types.
     *
     * @var ?string $type
     */
    private ?string $type;

    /**
     * If a [state](entity:GiftCardStatus) is provided, the endpoint returns the gift cards in the specified state.
     * Otherwise, the endpoint returns the gift cards of all states.
     *
     * @var ?string $state
     */
    private ?string $state;

    /**
     * If a limit is provided, the endpoint returns only the specified number of results per page.
     * The maximum value is 200. The default value is 30.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * If a cursor is not provided, the endpoint returns the first page of the results.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * @var ?string $customerId If a customer ID is provided, the endpoint returns only the gift cards linked to the specified customer.
     */
    private ?string $customerId;

    /**
     * @param array{
     *   type?: ?string,
     *   state?: ?string,
     *   limit?: ?int,
     *   cursor?: ?string,
     *   customerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?string $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }
}
