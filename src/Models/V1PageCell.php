<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1PageCell
 */
class V1PageCell implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $pageId;

    /**
     * @var int|null
     */
    private $row;

    /**
     * @var int|null
     */
    private $column;

    /**
     * @var string|null
     */
    private $objectType;

    /**
     * @var string|null
     */
    private $objectId;

    /**
     * @var string|null
     */
    private $placeholderType;

    /**
     * Returns Page Id.
     *
     * The unique identifier of the page the cell is included on.
     */
    public function getPageId(): ?string
    {
        return $this->pageId;
    }

    /**
     * Sets Page Id.
     *
     * The unique identifier of the page the cell is included on.
     *
     * @maps page_id
     */
    public function setPageId(?string $pageId): void
    {
        $this->pageId = $pageId;
    }

    /**
     * Returns Row.
     *
     * The row of the cell. Always an integer between 0 and 4, inclusive.
     */
    public function getRow(): ?int
    {
        return $this->row;
    }

    /**
     * Sets Row.
     *
     * The row of the cell. Always an integer between 0 and 4, inclusive.
     *
     * @maps row
     */
    public function setRow(?int $row): void
    {
        $this->row = $row;
    }

    /**
     * Returns Column.
     *
     * The column of the cell. Always an integer between 0 and 4, inclusive.
     */
    public function getColumn(): ?int
    {
        return $this->column;
    }

    /**
     * Sets Column.
     *
     * The column of the cell. Always an integer between 0 and 4, inclusive.
     *
     * @maps column
     */
    public function setColumn(?int $column): void
    {
        $this->column = $column;
    }

    /**
     * Returns Object Type.
     */
    public function getObjectType(): ?string
    {
        return $this->objectType;
    }

    /**
     * Sets Object Type.
     *
     * @maps object_type
     */
    public function setObjectType(?string $objectType): void
    {
        $this->objectType = $objectType;
    }

    /**
     * Returns Object Id.
     *
     * The unique identifier of the entity represented in the cell. Not present for cells with an
     * object_type of PLACEHOLDER.
     */
    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    /**
     * Sets Object Id.
     *
     * The unique identifier of the entity represented in the cell. Not present for cells with an
     * object_type of PLACEHOLDER.
     *
     * @maps object_id
     */
    public function setObjectId(?string $objectId): void
    {
        $this->objectId = $objectId;
    }

    /**
     * Returns Placeholder Type.
     */
    public function getPlaceholderType(): ?string
    {
        return $this->placeholderType;
    }

    /**
     * Sets Placeholder Type.
     *
     * @maps placeholder_type
     */
    public function setPlaceholderType(?string $placeholderType): void
    {
        $this->placeholderType = $placeholderType;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['page_id']         = $this->pageId;
        $json['row']             = $this->row;
        $json['column']          = $this->column;
        $json['object_type']     = $this->objectType;
        $json['object_id']       = $this->objectId;
        $json['placeholder_type'] = $this->placeholderType;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
