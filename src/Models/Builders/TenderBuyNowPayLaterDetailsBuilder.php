<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\TenderBuyNowPayLaterDetails;

/**
 * Builder for model TenderBuyNowPayLaterDetails
 *
 * @see TenderBuyNowPayLaterDetails
 */
class TenderBuyNowPayLaterDetailsBuilder
{
    /**
     * @var TenderBuyNowPayLaterDetails
     */
    private $instance;

    private function __construct(TenderBuyNowPayLaterDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new tender buy now pay later details Builder object.
     */
    public static function init(): self
    {
        return new self(new TenderBuyNowPayLaterDetails());
    }

    /**
     * Sets buy now pay later brand field.
     */
    public function buyNowPayLaterBrand(?string $value): self
    {
        $this->instance->setBuyNowPayLaterBrand($value);
        return $this;
    }

    /**
     * Sets status field.
     */
    public function status(?string $value): self
    {
        $this->instance->setStatus($value);
        return $this;
    }

    /**
     * Initializes a new tender buy now pay later details object.
     */
    public function build(): TenderBuyNowPayLaterDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
