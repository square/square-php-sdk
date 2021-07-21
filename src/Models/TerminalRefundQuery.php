<?php

declare(strict_types=1);

namespace Square\Models;

class TerminalRefundQuery implements \JsonSerializable
{
    /**
     * @var TerminalRefundQueryFilter|null
     */
    private $filter;

    /**
     * @var TerminalRefundQuerySort|null
     */
    private $sort;

    /**
     * Returns Filter.
     */
    public function getFilter(): ?TerminalRefundQueryFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * @maps filter
     */
    public function setFilter(?TerminalRefundQueryFilter $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Returns Sort.
     */
    public function getSort(): ?TerminalRefundQuerySort
    {
        return $this->sort;
    }

    /**
     * Sets Sort.
     *
     * @maps sort
     */
    public function setSort(?TerminalRefundQuerySort $sort): void
    {
        $this->sort = $sort;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->filter)) {
            $json['filter'] = $this->filter;
        }
        if (isset($this->sort)) {
            $json['sort']   = $this->sort;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
