<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\SearchOrdersCustomerFilter;
use Square\Legacy\Models\SearchOrdersDateTimeFilter;
use Square\Legacy\Models\SearchOrdersFilter;
use Square\Legacy\Models\SearchOrdersFulfillmentFilter;
use Square\Legacy\Models\SearchOrdersSourceFilter;
use Square\Legacy\Models\SearchOrdersStateFilter;

/**
 * Builder for model SearchOrdersFilter
 *
 * @see SearchOrdersFilter
 */
class SearchOrdersFilterBuilder
{
    /**
     * @var SearchOrdersFilter
     */
    private $instance;

    private function __construct(SearchOrdersFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Orders Filter Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchOrdersFilter());
    }

    /**
     * Sets state filter field.
     *
     * @param SearchOrdersStateFilter|null $value
     */
    public function stateFilter(?SearchOrdersStateFilter $value): self
    {
        $this->instance->setStateFilter($value);
        return $this;
    }

    /**
     * Sets date time filter field.
     *
     * @param SearchOrdersDateTimeFilter|null $value
     */
    public function dateTimeFilter(?SearchOrdersDateTimeFilter $value): self
    {
        $this->instance->setDateTimeFilter($value);
        return $this;
    }

    /**
     * Sets fulfillment filter field.
     *
     * @param SearchOrdersFulfillmentFilter|null $value
     */
    public function fulfillmentFilter(?SearchOrdersFulfillmentFilter $value): self
    {
        $this->instance->setFulfillmentFilter($value);
        return $this;
    }

    /**
     * Sets source filter field.
     *
     * @param SearchOrdersSourceFilter|null $value
     */
    public function sourceFilter(?SearchOrdersSourceFilter $value): self
    {
        $this->instance->setSourceFilter($value);
        return $this;
    }

    /**
     * Sets customer filter field.
     *
     * @param SearchOrdersCustomerFilter|null $value
     */
    public function customerFilter(?SearchOrdersCustomerFilter $value): self
    {
        $this->instance->setCustomerFilter($value);
        return $this;
    }

    /**
     * Initializes a new Search Orders Filter object.
     */
    public function build(): SearchOrdersFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
