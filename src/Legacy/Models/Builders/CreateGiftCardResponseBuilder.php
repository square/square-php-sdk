<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateGiftCardResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GiftCard;

/**
 * Builder for model CreateGiftCardResponse
 *
 * @see CreateGiftCardResponse
 */
class CreateGiftCardResponseBuilder
{
    /**
     * @var CreateGiftCardResponse
     */
    private $instance;

    private function __construct(CreateGiftCardResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Gift Card Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateGiftCardResponse());
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
     * Initializes a new Create Gift Card Response object.
     */
    public function build(): CreateGiftCardResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
