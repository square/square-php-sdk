<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The query filter to return the search result whose searchable attribute values contain all of the
 * specified keywords or tokens, independent of the token order or case.
 */
class CatalogQueryText implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $keywords;

    /**
     * @param string[] $keywords
     */
    public function __construct(array $keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Returns Keywords.
     *
     * A list of 1, 2, or 3 search keywords. Keywords with fewer than 3 characters are ignored.
     *
     * @return string[]
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * Sets Keywords.
     *
     * A list of 1, 2, or 3 search keywords. Keywords with fewer than 3 characters are ignored.
     *
     * @required
     * @maps keywords
     *
     * @param string[] $keywords
     */
    public function setKeywords(array $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['keywords'] = $this->keywords;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
