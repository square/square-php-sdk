<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\AfterpayDetails;
use Square\Legacy\Models\BuyNowPayLaterDetails;
use Square\Legacy\Models\ClearpayDetails;

/**
 * Builder for model BuyNowPayLaterDetails
 *
 * @see BuyNowPayLaterDetails
 */
class BuyNowPayLaterDetailsBuilder
{
    /**
     * @var BuyNowPayLaterDetails
     */
    private $instance;

    private function __construct(BuyNowPayLaterDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Buy Now Pay Later Details Builder object.
     */
    public static function init(): self
    {
        return new self(new BuyNowPayLaterDetails());
    }

    /**
     * Sets brand field.
     *
     * @param string|null $value
     */
    public function brand(?string $value): self
    {
        $this->instance->setBrand($value);
        return $this;
    }

    /**
     * Unsets brand field.
     */
    public function unsetBrand(): self
    {
        $this->instance->unsetBrand();
        return $this;
    }

    /**
     * Sets afterpay details field.
     *
     * @param AfterpayDetails|null $value
     */
    public function afterpayDetails(?AfterpayDetails $value): self
    {
        $this->instance->setAfterpayDetails($value);
        return $this;
    }

    /**
     * Sets clearpay details field.
     *
     * @param ClearpayDetails|null $value
     */
    public function clearpayDetails(?ClearpayDetails $value): self
    {
        $this->instance->setClearpayDetails($value);
        return $this;
    }

    /**
     * Initializes a new Buy Now Pay Later Details object.
     */
    public function build(): BuyNowPayLaterDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
