<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListDiscountsResponse implements \JsonSerializable
{
    /**
     * @var V1Discount[]|null
     */
    private $items;

    /**
     * Returns Items.
     *
     * @return V1Discount[]|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * Sets Items.
     *
     * @maps items
     *
     * @param V1Discount[]|null $items
     */
    public function setItems(?array $items): void
    {
        $this->items = $items;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['items'] = $this->items;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
