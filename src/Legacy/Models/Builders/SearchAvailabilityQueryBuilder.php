<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\SearchAvailabilityFilter;
use Square\Legacy\Models\SearchAvailabilityQuery;

/**
 * Builder for model SearchAvailabilityQuery
 *
 * @see SearchAvailabilityQuery
 */
class SearchAvailabilityQueryBuilder
{
    /**
     * @var SearchAvailabilityQuery
     */
    private $instance;

    private function __construct(SearchAvailabilityQuery $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Availability Query Builder object.
     *
     * @param SearchAvailabilityFilter $filter
     */
    public static function init(SearchAvailabilityFilter $filter): self
    {
        return new self(new SearchAvailabilityQuery($filter));
    }

    /**
     * Initializes a new Search Availability Query object.
     */
    public function build(): SearchAvailabilityQuery
    {
        return CoreHelper::clone($this->instance);
    }
}
