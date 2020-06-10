<?php

declare(strict_types=1);

namespace Square\Models;

class V1DeletePageCellRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $row;

    /**
     * @var string|null
     */
    private $column;

    /**
     * Returns Row.
     *
     * The row of the cell to clear. Always an integer between 0 and 4, inclusive. Row 0 is the top row.
     */
    public function getRow(): ?string
    {
        return $this->row;
    }

    /**
     * Sets Row.
     *
     * The row of the cell to clear. Always an integer between 0 and 4, inclusive. Row 0 is the top row.
     *
     * @maps row
     */
    public function setRow(?string $row): void
    {
        $this->row = $row;
    }

    /**
     * Returns Column.
     *
     * The column of the cell to clear. Always an integer between 0 and 4, inclusive. Column 0 is the
     * leftmost column.
     */
    public function getColumn(): ?string
    {
        return $this->column;
    }

    /**
     * Sets Column.
     *
     * The column of the cell to clear. Always an integer between 0 and 4, inclusive. Column 0 is the
     * leftmost column.
     *
     * @maps column
     */
    public function setColumn(?string $column): void
    {
        $this->column = $column;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['row']    = $this->row;
        $json['column'] = $this->column;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
