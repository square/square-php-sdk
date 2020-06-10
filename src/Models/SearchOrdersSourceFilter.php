<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Filter based on order `source` information.
 */
class SearchOrdersSourceFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $sourceNames;

    /**
     * Returns Source Names.
     *
     * Filters by [Source](#type-ordersource) `name`. Will return any orders
     * with with a `source.name` that matches any of the listed source names.
     *
     * Max: 10 source names.
     *
     * @return string[]|null
     */
    public function getSourceNames(): ?array
    {
        return $this->sourceNames;
    }

    /**
     * Sets Source Names.
     *
     * Filters by [Source](#type-ordersource) `name`. Will return any orders
     * with with a `source.name` that matches any of the listed source names.
     *
     * Max: 10 source names.
     *
     * @maps source_names
     *
     * @param string[]|null $sourceNames
     */
    public function setSourceNames(?array $sourceNames): void
    {
        $this->sourceNames = $sourceNames;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['source_names'] = $this->sourceNames;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
