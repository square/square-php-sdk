<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Sets the sort order of search results.
 */
class ShiftSort implements \JsonSerializable
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
     * Enumerates the `Shift` fields to sort on.
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * Sets Field.
     *
     * Enumerates the `Shift` fields to sort on.
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
