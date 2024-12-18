<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\Merchant;
use Square\Models\RetrieveMerchantResponse;

/**
 * Builder for model RetrieveMerchantResponse
 *
 * @see RetrieveMerchantResponse
 */
class RetrieveMerchantResponseBuilder
{
    /**
     * @var RetrieveMerchantResponse
     */
    private $instance;

    private function __construct(RetrieveMerchantResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Merchant Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveMerchantResponse());
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
     * @param Merchant|null $value
     */
    public function merchant(?Merchant $value): self
    {
        $this->instance->setMerchant($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Merchant Response object.
     */
    public function build(): RetrieveMerchantResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
