<?php

namespace Square\Cards\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SortOrder;

class ListCardsRequest extends JsonSerializableType
{
    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination) for more information.
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * Limit results to cards associated with the customer supplied.
     * By default, all cards owned by the merchant are returned.
     *
     * @var ?string $customerId
     */
    private ?string $customerId;

    /**
     * Includes disabled cards.
     * By default, all enabled cards owned by the merchant are returned.
     *
     * @var ?bool $includeDisabled
     */
    private ?bool $includeDisabled;

    /**
     * @var ?string $referenceId Limit results to cards associated with the reference_id supplied.
     */
    private ?string $referenceId;

    /**
     * Sorts the returned list by when the card was created with the specified order.
     * This field defaults to ASC.
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    private ?string $sortOrder;

    /**
     * @param array{
     *   cursor?: ?string,
     *   customerId?: ?string,
     *   includeDisabled?: ?bool,
     *   referenceId?: ?string,
     *   sortOrder?: ?value-of<SortOrder>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->includeDisabled = $values['includeDisabled'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
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

    /**
     * @return ?bool
     */
    public function getIncludeDisabled(): ?bool
    {
        return $this->includeDisabled;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeDisabled(?bool $value = null): self
    {
        $this->includeDisabled = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setSortOrder(?string $value = null): self
    {
        $this->sortOrder = $value;
        return $this;
    }
}
