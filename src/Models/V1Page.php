<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1Page
 */
class V1Page implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var int|null
     */
    private $pageIndex;

    /**
     * @var V1PageCell[]|null
     */
    private $cells;

    /**
     * Returns Id.
     *
     * The page's unique identifier.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The page's unique identifier.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The page's name, if any.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The page's name, if any.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Page Index.
     *
     * The page's position in the merchant's list of pages. Always an integer between 0 and 6, inclusive.
     */
    public function getPageIndex(): ?int
    {
        return $this->pageIndex;
    }

    /**
     * Sets Page Index.
     *
     * The page's position in the merchant's list of pages. Always an integer between 0 and 6, inclusive.
     *
     * @maps page_index
     */
    public function setPageIndex(?int $pageIndex): void
    {
        $this->pageIndex = $pageIndex;
    }

    /**
     * Returns Cells.
     *
     * The cells included on the page.
     *
     * @return V1PageCell[]|null
     */
    public function getCells(): ?array
    {
        return $this->cells;
    }

    /**
     * Sets Cells.
     *
     * The cells included on the page.
     *
     * @maps cells
     *
     * @param V1PageCell[]|null $cells
     */
    public function setCells(?array $cells): void
    {
        $this->cells = $cells;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']        = $this->id;
        $json['name']      = $this->name;
        $json['page_index'] = $this->pageIndex;
        $json['cells']     = $this->cells;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
