<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\SearchOrdersStateFilter;

/**
 * Builder for model SearchOrdersStateFilter
 *
 * @see SearchOrdersStateFilter
 */
class SearchOrdersStateFilterBuilder
{
    /**
     * @var SearchOrdersStateFilter
     */
    private $instance;

    private function __construct(SearchOrdersStateFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Orders State Filter Builder object.
     *
     * @param string[] $states
     */
    public static function init(array $states): self
    {
        return new self(new SearchOrdersStateFilter($states));
    }

    /**
     * Initializes a new Search Orders State Filter object.
     */
    public function build(): SearchOrdersStateFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
