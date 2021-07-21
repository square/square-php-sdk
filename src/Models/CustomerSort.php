<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Specifies how searched customers profiles are sorted, including the sort key and sort order.
 */
class CustomerSort implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $field;

    /**
     * @var string|null
     */
    private $order;

    /**
     * Returns Field.
     *
     * Specifies customer attributes as the sort key to customer profiles returned from a search.
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * Sets Field.
     *
     * Specifies customer attributes as the sort key to customer profiles returned from a search.
     *
     * @maps field
     */
    public function setField(?string $field): void
    {
        $this->field = $field;
    }

    /**
     * Returns Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * Sets Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps order
     */
    public function setOrder(?string $order): void
    {
        $this->order = $order;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->field)) {
            $json['field'] = $this->field;
        }
        if (isset($this->order)) {
            $json['order'] = $this->order;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
