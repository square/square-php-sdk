<?php

namespace Square\Checkout\PaymentLinks\Requests;

use Square\Core\Json\JsonSerializableType;

class ListPaymentLinksRequest extends JsonSerializableType
{
    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * If a cursor is not provided, the endpoint returns the first page of the results.
     * For more  information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * A limit on the number of results to return per page. The limit is advisory and
     * the implementation might return more or less results. If the supplied limit is negative, zero, or
     * greater than the maximum limit of 1000, it is ignored.
     *
     * Default value: `100`
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @param array{
     *   cursor?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
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
}
