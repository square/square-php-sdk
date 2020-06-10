<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListFeesResponse implements \JsonSerializable
{
    /**
     * @var V1Fee[]|null
     */
    private $items;

    /**
     * Returns Items.
     *
     * @return V1Fee[]|null
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
     * @param V1Fee[]|null $items
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
