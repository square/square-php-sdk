<?php

namespace Square\Orders\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\VisibilityFilter;

class ListCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var string $orderId The ID of the target [order](entity:Order).
     */
    private string $orderId;

    /**
     * @var ?value-of<VisibilityFilter> $visibilityFilter Requests that all of the custom attributes be returned, or only those that are read-only or read-write.
     */
    private ?string $visibilityFilter;

    /**
     * The cursor returned in the paged response from the previous call to this endpoint.
     * Provide this cursor to retrieve the next page of results for your original request.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * The maximum number of results to return in a single paged response. This limit is advisory.
     * The response might contain more or fewer results. The minimum value is 1 and the maximum value is 100.
     * The default value is 20.
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * Indicates whether to return the [custom attribute definition](entity:CustomAttributeDefinition) in the `definition` field of each
     * custom attribute. Set this parameter to `true` to get the name and description of each custom attribute,
     * information about the data type, or other definition details. The default value is `false`.
     *
     * @var ?bool $withDefinitions
     */
    private ?bool $withDefinitions;

    /**
     * @param array{
     *   orderId: string,
     *   visibilityFilter?: ?value-of<VisibilityFilter>,
     *   cursor?: ?string,
     *   limit?: ?int,
     *   withDefinitions?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orderId = $values['orderId'];
        $this->visibilityFilter = $values['visibilityFilter'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->withDefinitions = $values['withDefinitions'] ?? null;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $value
     */
    public function setOrderId(string $value): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return ?value-of<VisibilityFilter>
     */
    public function getVisibilityFilter(): ?string
    {
        return $this->visibilityFilter;
    }

    /**
     * @param ?value-of<VisibilityFilter> $value
     */
    public function setVisibilityFilter(?string $value = null): self
    {
        $this->visibilityFilter = $value;
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
     * @return ?bool
     */
    public function getWithDefinitions(): ?bool
    {
        return $this->withDefinitions;
    }

    /**
     * @param ?bool $value
     */
    public function setWithDefinitions(?bool $value = null): self
    {
        $this->withDefinitions = $value;
        return $this;
    }
}
