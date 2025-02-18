<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\LoyaltyEventTypeFilter;

/**
 * Builder for model LoyaltyEventTypeFilter
 *
 * @see LoyaltyEventTypeFilter
 */
class LoyaltyEventTypeFilterBuilder
{
    /**
     * @var LoyaltyEventTypeFilter
     */
    private $instance;

    private function __construct(LoyaltyEventTypeFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Loyalty Event Type Filter Builder object.
     *
     * @param string[] $types
     */
    public static function init(array $types): self
    {
        return new self(new LoyaltyEventTypeFilter($types));
    }

    /**
     * Initializes a new Loyalty Event Type Filter object.
     */
    public function build(): LoyaltyEventTypeFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
