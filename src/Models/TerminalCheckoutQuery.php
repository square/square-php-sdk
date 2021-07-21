<?php

declare(strict_types=1);

namespace Square\Models;

class TerminalCheckoutQuery implements \JsonSerializable
{
    /**
     * @var TerminalCheckoutQueryFilter|null
     */
    private $filter;

    /**
     * @var TerminalCheckoutQuerySort|null
     */
    private $sort;

    /**
     * Returns Filter.
     */
    public function getFilter(): ?TerminalCheckoutQueryFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * @maps filter
     */
    public function setFilter(?TerminalCheckoutQueryFilter $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Returns Sort.
     */
    public function getSort(): ?TerminalCheckoutQuerySort
    {
        return $this->sort;
    }

    /**
     * Sets Sort.
     *
     * @maps sort
     */
    public function setSort(?TerminalCheckoutQuerySort $sort): void
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
