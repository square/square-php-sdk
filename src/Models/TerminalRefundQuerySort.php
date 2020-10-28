<?php

declare(strict_types=1);

namespace Square\Models;

class TerminalRefundQuerySort implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Sort Order.
     *
     * The order in which results are listed.
     * - `ASC` - oldest to newest
     * - `DESC` - newest to oldest (default).
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order in which results are listed.
     * - `ASC` - oldest to newest
     * - `DESC` - newest to oldest (default).
     *
     * @maps sort_order
     */
    public function setSortOrder(?string $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['sort_order'] = $this->sortOrder;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
