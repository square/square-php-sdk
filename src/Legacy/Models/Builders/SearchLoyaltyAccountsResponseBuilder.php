<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\LoyaltyAccount;
use Square\Legacy\Models\SearchLoyaltyAccountsResponse;

/**
 * Builder for model SearchLoyaltyAccountsResponse
 *
 * @see SearchLoyaltyAccountsResponse
 */
class SearchLoyaltyAccountsResponseBuilder
{
    /**
     * @var SearchLoyaltyAccountsResponse
     */
    private $instance;

    private function __construct(SearchLoyaltyAccountsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Loyalty Accounts Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchLoyaltyAccountsResponse());
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
     * Sets loyalty accounts field.
     *
     * @param LoyaltyAccount[]|null $value
     */
    public function loyaltyAccounts(?array $value): self
    {
        $this->instance->setLoyaltyAccounts($value);
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
     * Initializes a new Search Loyalty Accounts Response object.
     */
    public function build(): SearchLoyaltyAccountsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
