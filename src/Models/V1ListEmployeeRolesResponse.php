<?php

declare(strict_types=1);

namespace Square\Models;

class V1ListEmployeeRolesResponse implements \JsonSerializable
{
    /**
     * @var V1EmployeeRole[]|null
     */
    private $items;

    /**
     * Returns Items.
     *
     * @return V1EmployeeRole[]|null
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
     * @param V1EmployeeRole[]|null $items
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
        if (isset($this->items)) {
            $json['items'] = $this->items;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
