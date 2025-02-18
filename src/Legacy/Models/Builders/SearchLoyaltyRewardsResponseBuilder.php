<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\LoyaltyReward;
use Square\Legacy\Models\SearchLoyaltyRewardsResponse;

/**
 * Builder for model SearchLoyaltyRewardsResponse
 *
 * @see SearchLoyaltyRewardsResponse
 */
class SearchLoyaltyRewardsResponseBuilder
{
    /**
     * @var SearchLoyaltyRewardsResponse
     */
    private $instance;

    private function __construct(SearchLoyaltyRewardsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Loyalty Rewards Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchLoyaltyRewardsResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets rewards field.
     *
     * @param LoyaltyReward[]|null $value
     */
    public function rewards(?array $value): self
    {
        $this->instance->setRewards($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new Search Loyalty Rewards Response object.
     */
    public function build(): SearchLoyaltyRewardsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
