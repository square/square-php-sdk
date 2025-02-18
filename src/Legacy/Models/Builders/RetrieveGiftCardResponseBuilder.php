<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GiftCard;
use Square\Legacy\Models\RetrieveGiftCardResponse;

/**
 * Builder for model RetrieveGiftCardResponse
 *
 * @see RetrieveGiftCardResponse
 */
class RetrieveGiftCardResponseBuilder
{
    /**
     * @var RetrieveGiftCardResponse
     */
    private $instance;

    private function __construct(RetrieveGiftCardResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Gift Card Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveGiftCardResponse());
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
     * Sets gift card field.
     *
     * @param GiftCard|null $value
     */
    public function giftCard(?GiftCard $value): self
    {
        $this->instance->setGiftCard($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Gift Card Response object.
     */
    public function build(): RetrieveGiftCardResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
