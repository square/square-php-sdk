<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListModifierListsResponse implements \JsonSerializable
{
    /**
     * @var V1ModifierList[]|null
     */
    private $items;

    /**
     * Returns Items.
     *
     * @return V1ModifierList[]|null
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
     * @param V1ModifierList[]|null $items
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
