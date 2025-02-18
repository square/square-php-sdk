<?php

namespace Square\Webhooks\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SortOrder;

class ListSubscriptionsRequest extends JsonSerializableType
{
    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * Includes disabled [Subscription](entity:WebhookSubscription)s.
     * By default, all enabled [Subscription](entity:WebhookSubscription)s are returned.
     *
     * @var ?bool $includeDisabled
     */
    private ?bool $includeDisabled;

    /**
     * Sorts the returned list by when the [Subscription](entity:WebhookSubscription) was created with the specified order.
     * This field defaults to ASC.
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    private ?string $sortOrder;

    /**
     * The maximum number of results to be returned in a single page.
     * It is possible to receive fewer results than the specified limit on a given page.
     * The default value of 100 is also the maximum allowed value.
     *
     * Default: 100
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @param array{
     *   cursor?: ?string,
     *   includeDisabled?: ?bool,
     *   sortOrder?: ?value-of<SortOrder>,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->includeDisabled = $values['includeDisabled'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
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
