<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\SearchAvailabilityQuery;
use Square\Legacy\Models\SearchAvailabilityRequest;

/**
 * Builder for model SearchAvailabilityRequest
 *
 * @see SearchAvailabilityRequest
 */
class SearchAvailabilityRequestBuilder
{
    /**
     * @var SearchAvailabilityRequest
     */
    private $instance;

    private function __construct(SearchAvailabilityRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Availability Request Builder object.
     *
     * @param SearchAvailabilityQuery $query
     */
    public static function init(SearchAvailabilityQuery $query): self
    {
        return new self(new SearchAvailabilityRequest($query));
    }

    /**
     * Initializes a new Search Availability Request object.
     */
    public function build(): SearchAvailabilityRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
