<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\SearchSubscriptionsFilter;
use Square\Legacy\Models\SearchSubscriptionsQuery;

/**
 * Builder for model SearchSubscriptionsQuery
 *
 * @see SearchSubscriptionsQuery
 */
class SearchSubscriptionsQueryBuilder
{
    /**
     * @var SearchSubscriptionsQuery
     */
    private $instance;

    private function __construct(SearchSubscriptionsQuery $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Subscriptions Query Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchSubscriptionsQuery());
    }

    /**
     * Sets filter field.
     *
     * @param SearchSubscriptionsFilter|null $value
     */
    public function filter(?SearchSubscriptionsFilter $value): self
    {
        $this->instance->setFilter($value);
        return $this;
    }

    /**
     * Initializes a new Search Subscriptions Query object.
     */
    public function build(): SearchSubscriptionsQuery
    {
        return CoreHelper::clone($this->instance);
    }
}
