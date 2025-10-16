<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Query parameters for searching transfer orders
 */
class TransferOrderQuery extends JsonSerializableType
{
    /**
     * @var ?TransferOrderFilter $filter Filter criteria
     */
    #[JsonProperty('filter')]
    private ?TransferOrderFilter $filter;

    /**
     * @var ?TransferOrderSort $sort Sort configuration
     */
    #[JsonProperty('sort')]
    private ?TransferOrderSort $sort;

    /**
     * @param array{
     *   filter?: ?TransferOrderFilter,
     *   sort?: ?TransferOrderSort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?TransferOrderFilter
     */
    public function getFilter(): ?TransferOrderFilter
    {
        return $this->filter;
    }

    /**
     * @param ?TransferOrderFilter $value
     */
    public function setFilter(?TransferOrderFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?TransferOrderSort
     */
    public function getSort(): ?TransferOrderSort
    {
        return $this->sort;
    }

    /**
     * @param ?TransferOrderSort $value
     */
    public function setSort(?TransferOrderSort $value = null): self
    {
        $this->sort = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
