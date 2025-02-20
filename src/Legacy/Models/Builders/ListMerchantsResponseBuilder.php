<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListMerchantsResponse;
use Square\Legacy\Models\Merchant;

/**
 * Builder for model ListMerchantsResponse
 *
 * @see ListMerchantsResponse
 */
class ListMerchantsResponseBuilder
{
    /**
     * @var ListMerchantsResponse
     */
    private $instance;

    private function __construct(ListMerchantsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Merchants Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListMerchantsResponse());
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
     * Sets merchant field.
     *
     * @param Merchant[]|null $value
     */
    public function merchant(?array $value): self
    {
        $this->instance->setMerchant($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param int|null $value
     */
    public function cursor(?int $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new List Merchants Response object.
     */
    public function build(): ListMerchantsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
